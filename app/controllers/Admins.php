<?php
class Admins extends Controller
{
    public function __construct()
    {
        if (!isLoggedIn()) {
            redirect('users/login');
        }

        $this->postModel = $this->model('Post');

    }

    public function index()
    {
        $numCounts = $this->postModel->getNumCommentsAdmin();
        $numCountsPosts = $this->postModel->getNumPostsAdmin();
        $numCountsPublier = $this->postModel->getNumCommentsPublierAdmin();
        $numCountsPriority = $this->postModel->getNumCommentsPriorityAdmin();

        $data = [
            'title' => 'Bienvenue dans l\'espace administrateur',
            'description' => 'Vous êtes dans l\'espace administrateur du site ou vous pouvez crée, modifier et supprimer les articles ainsi que les commentaires',
            'num_com' => $numCounts,
            'num_posts' => $numCountsPosts,
            'num_com_publier' => $numCountsPublier,
            'num_com_priority' => $numCountsPriority,
        ];

        $this->view('admins/index', $data);
    }
    // add method
    public function add()
    {

        $numCounts = $this->postModel->getNumCommentsAdmin();
        $numCountsPosts = $this->postModel->getNumPostsAdmin();

        // Check for POST
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            // Process form
            // Sanitize POST data
            $_POST = filter_input_array(INPUT_POST, FILTER_UNSAFE_RAW);

            // Init data
            $data = [
                'titre' => trim($_POST['titre']),
                'contenu' => trim($_POST['contenu']),
                'user_id' => $_SESSION['user_id'],
                'num_com' => $numCounts,
                'num_posts' => $numCountsPosts,
                'titre_err' => '',
                'contenu_err' => '',
            ];

            // Validate data
            if (empty($data['titre'])) {
                $data['titre_err'] = 'Veuillez entrer le titre d\'article';
            }
            if (empty($data['contenu'])) {
                $data['contenu_err'] = 'Veuillez entrer le contenu d\'article';
            }

            // Make sure no errors
            if (empty($data['titre_err']) && empty($data['contenu_err'])) {
                // Validated
                if ($this->postModel->addPost($data)) {
                    flash('post_message', ' L\'article est ajouter');
                    redirect('admins/add');
                } else {
                    die('Une erreur est survenu...');
                }

            } else {

                // Load the view with errors
                $this->view('admins/add', $data);

            }

        } else {

            $data = [
                'num_com' => $numCounts,
                'num_posts' => $numCountsPosts,
                'titre' => '',
                'contenu' => '',
                'titre_err' => '',
                'contenu_err' => '',
            ];

            $this->view('admins/add', $data);

        }

    }

    public function edit()
    {

        $posts = $this->postModel->getPosts();
        $numCounts = $this->postModel->getNumCommentsAdmin();
        $numCountsPosts = $this->postModel->getNumPostsAdmin();

        $data = [

            'posts' => $posts,
            'num_com' => $numCounts,
            'num_posts' => $numCountsPosts,

        ];

        $this->view('admins/edit', $data);
    }

    public function editArticle($id)
    {
        $numCounts = $this->postModel->getNumCommentsAdmin();
        $numCountsPosts = $this->postModel->getNumPostsAdmin();
        $post = $this->postModel->getPostById($id);

        // Check for POST
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            // Process form
            // Sanitize POST data
            $_POST = filter_input_array(INPUT_POST, FILTER_UNSAFE_RAW);

            // Init data
            $data = [
                'id' => $id,
                'titre' => trim($_POST['titre']),
                'contenu' => trim($_POST['contenu']),
                'user_id' => $_SESSION['user_id'],
                'num_com' => $numCounts,
                'num_posts' => $numCountsPosts,
                'titre_err' => '',
                'contenu_err' => '',
            ];

            // Validate data
            if (empty($data['titre'])) {
                $data['titre_err'] = 'Veuillez entrer le titre d\'article';
            }
            if (empty($data['contenu'])) {
                $data['contenu_err'] = 'Veuillez entrer le contenu d\'article';
            }

            // Make sure no errors
            if (empty($data['titre_err']) && empty($data['contenu_err'])) {
                // Validated
                if ($this->postModel->updatePost($data)) {
                    flash('post_message', ' L\'article est modifier');
                    redirect('admins/editArticle/' . $id);
                } else {
                    die('Une erreur est survenu');
                }

            } else {

                // Load the view with errors
                $this->view('admins/editArticle', $data);

            }

        } else {
            // Get the posts

            $data = [

                'id' => $id,
                'titre' => $post->titre,
                'contenu' => $post->contenu,
                'num_com' => $numCounts,
                'num_posts' => $numCountsPosts,
            ];

            $this->view('admins/editArticle', $data);

        }

    }

    public function delete($id)
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {

            if ($this->postModel->deletePost($id)) {
                flash('post_message', 'l\'article est supprimer');
                redirect('admins/edit');
            } else {
                die('Something went wrong');
            }
        } else {
            redirect('admins/edit');
        }

    }

    public function comments()
    {
        $adminComments = $this->postModel->getCommentsAdmin();
        $numCounts = $this->postModel->getNumCommentsAdmin();
        $numCountsPosts = $this->postModel->getNumPostsAdmin();

        $data = [

            'admin_cposts' => $adminComments,
            'num_com' => $numCounts,
            'num_posts' => $numCountsPosts,

        ];

        $this->view('admins/comments', $data);
    }

    public function deleteComments($id)
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {

            if ($this->postModel->deleteComment($id)) {
                flash('post_message', 'Commentaire est supprimer');
                redirect('admins/comments/' . $id);
            } else {
                die('Something went wrong');
            }
        } else {
            redirect('admins/comments');
        }

    }
    public function publierComments($id)
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {

            if ($this->postModel->publierComment($id)) {
                flash('post_message', 'Commentaire est Publier');
                redirect('admins/comments');
            } else {
                die('Something went wrong');
            }
        } else {
            redirect('admins/comments');
        }

    }

    public function depublierComments($id)
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {

            if ($this->postModel->depublierComment($id)) {
                flash('post_message', 'Commentaire est Dépublier');
                redirect('admins/comments');
            } else {
                die('Something went wrong');
            }
        } else {
            redirect('admins/comments');
        }

    }

}
