<?php
class ArticleModel extends CI_model
{
  public function get_articles($limit,$offset)
  {
    $id = $this->session->userdata('id');
    $q = $this->db->select()
                  ->from('article')
                  ->where(['user_id'=>$id])
                  ->limit($limit,$offset)
                  ->get();
    return $q->result();
  }
  public function total_rows()
  {
    $id = $this->session->userdata('id');
    $q = $this->db->select()
                  ->from('article')
                  ->where(['user_id'=>$id])
                  ->get();
    return $q->num_rows();
  }
  public function get_data_byId($article_id)
  {
    $q = $this->db->select()
                  ->from('article')
                  ->where(['ID'=>$article_id])
                  ->get();
    return $q->result();
  }
  public function create($post_data)
  {
    return $this->db->insert('article',$post_data);
  }
  public function delelete($article_id)
  {
    return $this->db->delete('article',['ID'=>$article_id]);
  }
  public function update($article_id,$post)
  {
    return $this->db->where(['ID'=>$article_id])
                    ->update('article',$post);
  }
}
?>
