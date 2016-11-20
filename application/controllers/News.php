<?php
class News extends CI_Controller{

/*
|--------------------------------------------------------------------------
| NEWS CONTROLLER
|--------------------------------------------------------------------------
| Loads CI_Controller, News_model, and URL_helper
|
*/
  public function __construct(){
    parent::__construct();
    $this->load->model('news_model');
    $this->load->helper('url_helper');
  }


/*
|--------------------------------------------------------------------------
|index()
|--------------------------------------------------------------------------
| Gets all news records from model and passes to view to be rendered
|
*/
  public function index(){
    $data['news'] = $this->news_model->get_news();
    $data['title'] = 'News archive';

    $this->load->view('templates/header', $data);
    $this->load->view('news/index', $data);
    $this->load->view('templates/footer');
  }


  public function view($slug = NULL){
    
    $data['news_item'] = $this->news_model->get_news($slug);
    
    /* If news_item is null, display error */
    if(empty($data['news_item'])){
      show_404();
    }
    
    $data['title'] = $data['news_item']['title'];
    
    $this->load->view('templates/header', $data);
    $this->load->view('news/view', $data);
    $this->load->view('templates/footer');
    
  }
  
}

?>