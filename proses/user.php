<?php
//require_once("../config/koneksi.php");
class User extends Koneksi
{
    public function tampilUser()
    {
        try{
            $query = "SELECT id_user,nama,kontak,email,username,level FROM user ORDER BY nama";
            $stmt = $this->db->prepare($query);
            $stmt->execute();
            if ($stmt->rowCount()>0) {
                $no = 1;
                while ($data =$stmt->fetch(PDO::FETCH_ASSOC)) {
                    $usia = ceil($data['usia']/365);
                    echo '<tr>
                        <td>'.$no.'</td>
                        <td>'.$data['nama'].'</td>
                        <td>'.$data['kontak'].'</td>
                        <td>'.$data['email'].'</td>
                        <td>'.$data['username'].'</td>
                        <td>'.$data['level'].'</td>
                        <td>
                            <a href="javascript:void(0);" class="btn btn-success btn-sm glyphicon glyphicon-edit" onclick="editUser(\''.$data['id_user'].'\')"></a>
                            <a class="btn btn-danger btn-sm glyphicon glyphicon-trash" href="?kanal=ms_user&act=hapus&id='.$data['id_user'].'"></a>
                        </td>
                    </tr>';
                $no++;  
                }
            } else {
                echo "data kosong";
            }
        }catch(PDOException $e){
            echo($e->getMessage());
        }       
    }

    public function tambahUser($nama,$kontak,$email,$username,$password,$level)
    {
        header("Content-type:application/json");
        try{
            $query = "INSERT INTO user(nama,kontak,email,username,password,level) VALUES(:nama,:kontak,:email,:username,:password,:level)";
            $stmt = $this->db->prepare($query);
            $stmt->bindParam(':nama',$nama);
            $stmt->bindParam(':kontak',$kontak);
            $stmt->bindParam(':email',$email);
            $stmt->bindParam(':username',$username);
            $stmt->bindParam(':password',$password);
            $stmt->bindParam(':level',$level);
            $stmt->execute();
            return true;
        }catch(PDOException $e){
            echo $e->getMessage();
            return false;
        }    
    }

    public function getUser($iduser)
    {
        try{
            $query = "SELECT nama,kontak,email,username,level FROM user WHERE id_user=:iduser";
            $stmt = $this->db->prepare($query);
            $stmt->bindParam(':iduser',$iduser);
            $stmt->execute();
            if ($stmt->rowCount()>0) {
                while($row = $stmt->fetch(PDO::FETCH_ASSOC)){
                    return $data[] = $row;
                }
            } else {
                return $data = null;
            }
        }catch(PDOException $e){
            echo $e->getMessage();
        }
    }

    public function edituser($iduser,$nama,$kontak,$email,$username,$password,$level)
    {
        try{
            $query = "UPDATE user SET nama=:nama,kontak=:kontak,email=:email,username=:username,password=:password,level=:level
                    WHERE id_user=:iduser";
            $stmt = $this->db->prepare($query);
            $stmt->bindParam(':iduser',$iduser);
            $stmt->bindParam(':nama',$nama);
            $stmt->bindParam(':kontak',$kontak);
            $stmt->bindParam(':email',$email);
            $stmt->bindParam(':username',$username);
            $stmt->bindParam(':password',$password);
            $stmt->bindParam(':level',$level);
            var_dump($stmt->execute());
            return true;
        }catch(PDOException $e){
            echo $e->getMessage();
            return false;
        }    
    }

    public function hapusUser($iduser)
    {
        try{
            $query = "DELETE FROM user WHERE id_user=:iduser";
            $stmt = $this->db->prepare($query);
            $stmt->bindParam(':iduser',$iduser);
            $stmt->execute();
            return true;
        }catch(PDOException $e){
            echo $e->getMessage();
            return false;
        }
    }
}

//$psn = new user();
//$psn->buatNo();
?>