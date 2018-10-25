<?php
//require_once("../config/koneksi.php");
class Diagnosa extends Koneksi
{
    public function tampilDiagnosa()
    {
        try{
            $query = "SELECT * FROM diagnosa ORDER BY nama_diagnosa";
            $stmt = $this->db->prepare($query);
            $stmt->execute();
            if ($stmt->rowCount()>0) {
                $no = 1;
                while ($data =$stmt->fetch(PDO::FETCH_ASSOC)) {
                    echo '<tr>
                        <td>'.$no.'</td>
                        <td>'.$data['nama_diagnosa'].'</td>
                        <td>'.$data['keterangan'].'</td>
                        <td>
                            <a class="btn btn-success btn-sm" href="?kanal=ms_diagnosa&act=edit&id='.$data[id_diagnosa].'">Edit</a>
                            <a class="btn btn-danger btn-sm" href="?kanal=ms_diagnosa&act=hapus&id='.$data[id_diagnosa].'">Hapus</a>
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

    public function tambahDiagnosa($nama_dgs,$keterangan)
    {
        try{
            $query = "INSERT INTO diagnosa(nama_diagnosa,keterangan) VALUES(:nama_dgs,:keterangan)";
            $stmt = $this->db->prepare($query);
            $stmt->bindParam(':nama_dgs',$nama_dgs);
            $stmt->bindParam(':keterangan',$keterangan);
            $stmt->execute();
            return true;
        }catch(PDOException $e){
            echo $e->getMessage();
            return false;
        }    
    }

    public function getDiagnosa($iddiagnosa)
    {
        try{
            $query = "SELECT * FROM diagnosa WHERE id_diagnosa=:iddiagnosa";
            $stmt = $this->db->prepare($query);
            $stmt->bindParam(':iddiagnosa',$iddiagnosa);
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

    public function editDiagnosa($iddiagnosa,$nama_dgs,$keterangan)
    {
        try{
            $query = "UPDATE diagnosa SET nama_diagnosa=:nama_dgs,keterangan=:keterangan
                    WHERE id_diagnosa=:iddiagnosa";
            $stmt = $this->db->prepare($query);
            $stmt->bindParam(':iddiagnosa',$iddiagnosa);
            $stmt->bindParam(':nama_dgs',$nama_dgs);
            $stmt->bindParam(':keterangan',$keterangan);
            var_dump($stmt->execute());
            return true;
        }catch(PDOException $e){
            echo $e->getMessage();
            return false;
        }    
    }

    public function hapusDiagnosa($iddiagnosa)
    {
        try{
            $query = "DELETE FROM diagnosa WHERE id_diagnosa=:iddiagnosa";
            $stmt = $this->db->prepare($query);
            $stmt->bindParam(':iddiagnosa',$iddiagnosa);
            $stmt->execute();
            return true;
        }catch(PDOException $e){
            echo $e->getMessage();
            return false;
        }
    }
}

//$psn = new Diagnosa();
//$psn->buatNo();
?>