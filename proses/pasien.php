<?php
//require_once("../config/koneksi.php");
class Pasien extends Koneksi
{
    public function tampilPasien()
    {
        try{
            $query = "SELECT *,datediff(CURDATE(),tgl_lahir) AS usia FROM pasien ORDER BY no_rm";
            $stmt = $this->db->prepare($query);
            $stmt->execute();
            if ($stmt->rowCount()>0) {
                $no = 1;
                while ($data =$stmt->fetch(PDO::FETCH_ASSOC)) {
                    $usia = ceil($data['usia']/365);
                    echo '<tr>
                        <td>'.$no.'</td>
                        <td>'.$data['no_rm'].'</td>
                        <td>'.$data['nama_pasien'].'</td>
                        <td>'.$data['alamat'].'</td>
                        <td>'.$data['tgl_lahir'].'</td>
                        <td>'.$usia.'</td>
                        <td>'.$data['jenis_kelamin'].'</td>
                        <td>
                            <a class="btn btn-success btn-sm glyphicon glyphicon-edit" href="?kanal=ms_pasien&act=edit&id='.$data['no_rm'].'"></a>
                            <a class="btn btn-danger btn-sm glyphicon glyphicon-trash" href="?kanal=ms_pasien&act=hapus&id='.$data['no_rm'].'"></a>
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

    public function buatNo()
    {
        $query = "SELECT MAX(no_rm) as maxRM FROM pasien";
        $stmt = $this->db->prepare($query);
        $stmt->execute();
        $data = $stmt->fetch(PDO::FETCH_ASSOC);
        $noRM = (int) substr($data['maxRM'],4,4);
        $noRM++;
        $char = "00";
        $newRM = $char.sprintf("%04s",$noRM);
        return $newRM;
    }

    public function tambahPasien($norm,$nama,$tgllahir,$alamat,$jk)
    {
        try{
            $query = "INSERT INTO pasien VALUES(:norm,:nama,:tgllahir,:alamat,:jk,now())";
            $stmt = $this->db->prepare($query);
            $stmt->bindParam(':norm',$norm);
            $stmt->bindParam(':nama',$nama);
            $stmt->bindParam(':tgllahir',$tgllahir);
            $stmt->bindParam(':alamat',$alamat);
            $stmt->bindParam(':jk',$jk);
            $stmt->execute();
            return true;
        }catch(PDOException $e){
            echo $e->getMessage();
            return false;
        }    
    }

    public function getPasien($norm)
    {
        try{
            $query = "SELECT nama_pasien,tgl_lahir,alamat,jenis_kelamin FROM pasien WHERE no_rm=:norm";
            $stmt = $this->db->prepare($query);
            $stmt->bindParam(':norm',$norm);
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

    public function editPasien($norm,$nama,$tgllahir,$alamat,$jk)
    {
        try{
            $query = "UPDATE pasien SET nama_pasien=:nama,tgl_lahir=:tgllahir,alamat=:alamat,jenis_kelamin=:jk
                    WHERE no_rm=:norm";
            $stmt = $this->db->prepare($query);
            $stmt->bindParam(':norm',$norm);
            $stmt->bindParam(':nama',$nama);
            $stmt->bindParam(':tgllahir',$tgllahir);
            $stmt->bindParam(':alamat',$alamat);
            $stmt->bindParam(':jk',$jk);
            $stmt->execute();
            return true;
        }catch(PDOException $e){
            echo $e->getMessage();
            return false;
        }    
    }

    public function hapusPasien($norm)
    {
        try{
            $query = "DELETE FROM pasien WHERE no_rm=:norm";
            $stmt = $this->db->prepare($query);
            $stmt->bindParam(':norm',$norm);
            $stmt->execute();
            return true;
        }catch(PDOException $e){
            echo $e->getMessage();
            return false;
        }
    }
}

//$psn = new Pasien();
//$psn->buatNo();
?>