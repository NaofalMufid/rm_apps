<?php
//require_once("../config/koneksi.php");
class Obat extends Koneksi
{
    public function tampilObat()
    {
        try{
            $query = "SELECT * FROM obat ORDER BY nama_obat";
            $stmt = $this->db->prepare($query);
            $stmt->execute();
            if ($stmt->rowCount()>0) {
                $no = 1;
                while ($data =$stmt->fetch(PDO::FETCH_ASSOC)) {
                    echo '<tr>
                        <td>'.$no.'</td>
                        <td>'.$data['nama_obat'].'</td>
                        <td>'.$data['harga_obat'].'</td>
                        <td>'.$data['keterangan'].'</td>
                        <td>
                            <a class="btn btn-success btn-sm" href="?kanal=ms_obat&act=edit&id='.$data[id_obat].'">Edit</a>
                            <a class="btn btn-danger btn-sm" href="?kanal=ms_obat&act=hapus&id='.$data[id_obat].'">Hapus</a>
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

    public function tambahObat($namaObat,$hrgObat,$ket)
    {
        try{
            $query = "INSERT INTO obat(nama_obat,harga_obat,keterangan) VALUES(:namaObat,:hrgObat,:ket)";
            $stmt = $this->db->prepare($query);
            $stmt->bindParam(':namaObat',$namaObat);
            $stmt->bindParam(':hrgObat',$hrgObat);
            $stmt->bindParam(':ket',$ket);
            $stmt->execute();
            return true;
        }catch(PDOException $e){
            echo $e->getMessage();
            return false;
        }    
    }

    public function getObat($idObat)
    {
        try{
            $query = "SELECT * FROM obat WHERE id_obat=:idObat";
            $stmt = $this->db->prepare($query);
            $stmt->bindParam(':idObat',$idObat);
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

    public function editObat($idObat,$namaObat,$hrgObat,$ket)
    {
        try{
            $query = "UPDATE obat SET nama_obat=:namaObat,harga_obat=:hrgObat,keterangan=:ket
                    WHERE id_obat=:idObat";
            $stmt = $this->db->prepare($query);
            $stmt->bindParam(':idObat',$idObat);
            $stmt->bindParam(':namaObat',$namaObat);
            $stmt->bindParam(':hrgObat',$hrgObat);
            $stmt->bindParam(':ket',$ket);
            $stmt->execute();
            return true;
        }catch(PDOException $e){
            echo $e->getMessage();
            return false;
        }    
    }

    public function hapusObat($idObat)
    {
        try{
            $query = "DELETE FROM obat WHERE id_obat=:idObat";
            $stmt = $this->db->prepare($query);
            $stmt->bindParam(':idObat',$idObat);
            $stmt->execute();
            return true;
        }catch(PDOException $e){
            echo $e->getMessage();
            return false;
        }
    }
}

//$psn = new Obat();
//$psn->buatNo();
?>