<?php
class Bot
{
    private $name = "Beltrix";
    //private $gender = "Mujer";

    public function getName()
    {
        return $this->name;
    }

    public function getGender()
    {
        return $this->gender;
    }

    public function hears($message, callable $call)
    {
        $call(new Bot);
        return $message;
    }

    public function reply($response)
    {
        echo $response;
    }

    public function replyMenu($data)
    {
        if(isset($_POST['data']))
    {
      $data = $_POST ['data'];
  
      if ($_POST['data'] !=0 && $_POST['data'] = 1) 
      {
        $menu = "SELECT * FROM menuopciones WHERE idsuperior = 1";
        $resultado = mysqli_query($conn,$menu);
       
          while ($row = mysqli_fetch_array($resultado)) 
          {
            echo $row [0];
            echo $row [1];
          }
          
      }
    } 
    }
    

    /*public function ask($question, array $questionDictionary)
    {
        $question = trim($question);
        foreach ($questionDictionary as $questions => $value) {
            if ($question == $questions) {
                return $value;
            }
        }
    }*/
}
