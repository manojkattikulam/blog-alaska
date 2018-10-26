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
            if (!isset($_GET['page'])) {
                $page = 1;
            } else {
                $page = $_GET['page'];
            }

        // determine the sql LIMIT starting number for the results on the displaying page
        $this_page_first_result = ($page-1)*$results_per_page;

        // retrieve selected results from database and display them on page

        $data = [
            'a' => $this_page_first_result, 
            'b' => $results_per_page 
        ];
        $postsPgn = $this->postModel->getArticlesPgn($data);

        $data = [
            'title' => 'Billet simple pour Alaska',
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

                'title' => 'Billet simple pour Alaska',
                'description' => 'par Jean Forteroche',

                'id' => $id,
                'titre' => $post->titre,
                'contenu' => $post->contenu,
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
                'title' => 'Billet simple pour Alaska',
                'description' => 'par Jean Forteroche',

                'id' => $id,
                'titre' => $post->titre,
                'contenu' => $post->contenu,
                'date' => $post->date_creation_fr,
                'comments' => $cposts];

            $this->view('pages/show', $data);

        }

        

    }

    public function showAll(){

        $all = $this->postModel->showAlls();

        $data = [

            'mixpost' => $all
        ];


        $this->view('pages/showAll', $data);

    }

}
