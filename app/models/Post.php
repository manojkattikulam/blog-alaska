<?php
class Post
{
    private $db;

    public function __construct()
    {
        $this->db = new Database;
    }

    public function getPosts()
    {
        $this->db->query('SELECT posts_id, titre, contenu, DATE_FORMAT(date_creation, \'%d/%m/%Y\') AS date_creation_fr FROM posts ORDER BY date_creation DESC');

        $results = $this->db->resultSet();

        return $results;

    }

    public function getArticlesPgn($data)
    {
        $this->db->query('SELECT posts_id, titre, contenu, DATE_FORMAT(date_creation, \'%d/%m/%Y\') AS date_creation_fr FROM posts ORDER BY date_creation DESC LIMIT ' . $data['a'] . ',' . $data['b']);

        $results = $this->db->resultSet();

        return $results;

    }
    
    public function getArticlesCountPgn()
    {
        $this->db->query("SELECT * FROM posts");

        $this->db->execute();

        return $this->db->rowCount();

    }

    public function getPostById($id)
    {
        $this->db->query('SELECT posts_id, titre, contenu, DATE_FORMAT(date_creation, \'%d/%m/%Y \') AS date_creation_fr FROM posts WHERE posts_id = :id');
        $this->db->bind(':id', $id);

        $row = $this->db->single();

        return $row;
    }

    public function addPost($data)
    {

        $this->db->query('INSERT INTO posts (titre, contenu) VALUES(:titre, :contenu )');
        // Bind values
        $this->db->bind(':titre', $data['titre']);
        $this->db->bind(':contenu', $data['contenu']);

        // Execute
        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }

    }

    public function updatePost($data)
    {

        $this->db->query('UPDATE posts SET titre = :titre, contenu = :contenu WHERE posts_id = :id');
        // Bind values
        $this->db->bind(':id', $data['id']);
        $this->db->bind(':titre', $data['titre']);
        $this->db->bind(':contenu', $data['contenu']);

        // Execute
        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }

    }

    public function deletePost($id)
    {

        $this->db->query('DELETE FROM posts WHERE posts_id = :id');
        // Bind values
        $this->db->bind(':id', $id);

        // Execute
        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }

    }

    public function getComments($id)
    {

        $this->db->query('SELECT comment_author, comment_email, comment_text, DATE_FORMAT(comment_date, \'%d/%m/%Y à %Hh%imin%ss\') AS comment_date_fr FROM comments WHERE comment_status = :publier AND posts_id = :id');

        // Bind values
        $this->db->bind(':id', $id);
        $this->db->bind(':publier', 'Publié');

        $results = $this->db->resultSet();

        return $results;

    }

    public function addComments($data)
    {

        $this->db->query('INSERT INTO comments (posts_id, comment_author, comment_email, comment_text, comment_priority) VALUES(:post_id, :comment_author, :comment_email, :comment_text, :comment_priority )');

        // Bind values
        $this->db->bind(':post_id', $data['article_id']);
        $this->db->bind(':comment_author', $data['pseudo']);
        $this->db->bind(':comment_email', $data['email']);
        $this->db->bind(':comment_text', $data['commentaire']);
        $this->db->bind(':comment_priority', $data['priority']);

        // Execute
        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }

    }

    public function getNumPostsAdmin()
    {
        $this->db->query('SELECT * FROM posts');

        $this->db->execute();

        return $this->db->rowCount();

    }

    public function getCommentsAdmin()
    {

        $this->db->query('SELECT comment_id,comment_author, posts_id, comment_email, comment_text, DATE_FORMAT(comment_date, \'%d/%m/%Y à %Hh%imin%ss\') AS comment_date_fr, comment_status, comment_priority FROM comments  ORDER BY comment_priority DESC');

        $results = $this->db->resultSet();

        return $results;

    }

    public function getNumCommentsAdmin()
    {
        $this->db->query("SELECT comment_status, comment_priority FROM comments WHERE comment_status = 'Non Publié' ");

        $this->db->execute();

        return $this->db->rowCount();

    }

    


    public function getNumCommentsPublierAdmin()
    {
        $this->db->query('SELECT * FROM comments WHERE comment_status = :publier');

        // Bind values
        $this->db->bind(':publier', 'Publié');

        $this->db->execute();

        return $this->db->rowCount();

    }


    public function getNumCommentsPriorityAdmin()
    {
        $this->db->query('SELECT * FROM comments WHERE comment_priority = :priority');

        // Bind values
        $this->db->bind(':priority', 'Priorité');

        $this->db->execute();

        return $this->db->rowCount();

    }

    public function deleteComment($id)
    {

        $this->db->query('DELETE FROM comments WHERE comment_id = :id');
        // Bind values
        $this->db->bind(':id', $id);

        // Execute
        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }

    }

    public function publierComment($id)
    {

        $this->db->query('UPDATE comments SET comment_status = :publier, comment_priority = :nothing WHERE comment_id = :id');
        // Bind values
        $this->db->bind(':id', $id);
        $this->db->bind(':publier', 'Publié');
        $this->db->bind(':nothing','');

        // Execute
        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }

    }

 

    public function showAlls(){

        $this->db->query(
            
            'SELECT posts.titre, posts.contenu, comments.comment_author, comments.comment_text
             FROM posts
             INNER JOIN comments on posts.posts_id = comments.posts_id
             ORDER BY comments.comment_author'
        );

        $results = $this->db->resultSet();

        return $results;

    }


}
