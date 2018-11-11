<?php
class Pages extends Controller
{
    public function __construct()
    {
        $this->postModel = $this->model('Post');

    }

    public function index()
    {
        
        
        // define how many results you want per page
        $results_per_page = 3;  

        // find out the number of results stored in database
        $number_of_results = $this->postModel->getArticlesCountPgn();

        // determine number of total pages available
        $number_of_pages = ceil($number_of_results/$results_per_page);

        // determine which page number visitor is currently on
            
            if (isset($_GET['page']) && ($_GET['page'] <= $number_of_pages) && (intval($_GET['page']))) {

                $page = (int)$_GET['page'];
                $_SESSION['page_num'] = $page;
    
            } else {
                unset($_SESSION['page_num']);
                $page = (int)1;
                
            }

      

        // determine the sql LIMIT starting number for the results on the displaying page
        
        $this_page_first_result = ($page-1)*$results_per_page;
       

        // retrieve selected results from database and display them on page

        $dataPages = [
            'first_num' => filter_var($this_page_first_result, FILTER_SANITIZE_STRING),
            'last_num' => filter_var($results_per_page, FILTER_SANITIZE_STRING)
        ];
        $postsPgn = $this->postModel->getArticlesPgn($dataPages);

        $data = [
            'title' => 'Billet simple pour l\'Alaska',
            'description' => 'par Jean Forteroche',
            'posts' => $postsPgn,
            'num_pages' => $number_of_pages
            

        ];

        $this->view('pages/index', $data);
    }


    public function show($id)
    {

        $post = $this->postModel->getPostById($id);
        $cposts = $this->postModel->getComments($id);

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {

            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

            if (isset($_POST['priority'])) {
                $priority = $_POST['priority'];
            } else {
                $priority = "";
            }

            $data = [

                'title' => 'Billet simple pour l\'Alaska',
                'description' => 'par Jean Forteroche',

                'id' => $id,
                'titre' => $post->titre,
                'contenu' =>$post->contenu,
                'date' => $post->date_creation_fr,
                'comments' => $cposts,

                'article_id' => $_POST['article_id'],
                'pseudo' => $_POST['pseudo'],
                'email' => $_POST['email'],
                'commentaire' => $_POST['commentaire'],
                'priority' => $priority,
                'pseudo_err' => '',
                'email_err' => '',
                'commentaire_err' => ''];

            // Validate data
            if (empty($data['pseudo'])) {
                $data['pseudo_err'] = 'Veuillez entrer votre pseudo';
            }
            if (empty($data['email'])) {
                $data['email_err'] = 'Veuillez entrer votre email';
            }
            if (empty($data['commentaire'])) {
                $data['commentaire_err'] = 'Veuillez entrer le commentaire';
            }

            // Make sure no errors
            if (empty($data['pseudo_err']) && empty($data['email_err']) && empty($data['commentaire_err'])) {
                // Validated
                if ($this->postModel->addComments($data)) {
                    flash('post_message', ' Le commentaire est ajouter');
                    redirect('pages/show/' . $id);

                } else {
                    die('Une erreur est survenu');
                }

            } else {

                //Load the view with errors
                $this->view('pages/show', $data);

            }

        } else {

            $data = [
                'title' => 'Billet simple pour l\'Alaska',
                'description' => 'par Jean Forteroche',

                'id' => $id,
                'titre' => $post->titre,
                'contenu' => $post->contenu,
                'date' => $post->date_creation_fr,
                'comments' => $cposts];

            $this->view('pages/show', $data);

        }

        

    }


}
