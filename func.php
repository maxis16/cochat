<?php

/**
 * @author Aykut Alp
 * @copyright 2013
 */



class Func
{
    private $host;
    private $user;
    private $pass;
    private $db;
    private $baglanti;
    private $result;
    private $sonuc;
    private $idx;
    private $valx;
    private $ad;
public function __construct($host,$user,$pass,$db)
{
    $this->host=$host;
    $this->user=$user;
    $this->pass=$pass;
    $this->db=$db;
}
public function connect()
{
    try
    {
        $this->baglanti =@mysqli_connect($this->host,$this->user,$this->pass,$this->db);
        mysqli_query ( $this->baglanti,"SET NAMES 'utf8'" );
        mysqli_query ( $this->baglanti,"SET CHARACTER SET utf8" );
        mysqli_query ( $this->baglanti,"SET COLLATION_CONNECTION = 'utf8_turkish_ci'" );                
        if(!$this->baglanti)
        {
            throw new Exception("mysqli veritabanına bağlanamadım.");
        }    
    }
    catch(Exception $e)
    {
        die($e->getMessage());
    }
}
public function select()
{
    try
    {
        if(!mysqli_select_db($this->db,$this->baglanti))
        throw new Exception("Veritabanı seçilmedi.");    
    }
    catch(Exception $e)
    {
        die($e->getMessage());
    }
}
public function query($sql)
{
    try
    {
        $this->result=@mysqli_query($this->baglanti,$sql);
        if(!$this->result)
        throw new Exception("Sorgu çalışmadı.");
    }
    catch(Exception $e)
    {
        echo($e->getMessage());
    }
    return $this->result;
}
public function temizle($varx)
{
    try
    {
        $kod = mysqli_real_escape_string (  $this->baglanti ,$varx );
        $this->result=$kod;
        if(!$this->result)
        throw new Exception("Sorgu çalışmadı.");
    }
    catch(Exception $e)
    {
        echo($e->getMessage());
    }
    return $this->result;
}
public function close()
{
    mysqli_close($this->baglanti);
}
public function satirsay()
{
    return @mysqli_num_rows($this->result);
}
public function kayitno()
{
    return @mysqli_insert_id($this->baglanti);
}
}

?>
