<!DOCTYPE html>
<html lang="en">
<head>
    <title>Form Pasien</title>
</head>
<body>
    <form action="act_input_pasien.php" method="POST">
        <table>
            <tr>
                <td>Id Pasien</td>
                <td><input type="text" name="idpasien"></td>
            </tr>
            <tr>
                <td>Nama Pasien</td>
                <td><input type="text" name="nama_pasien"></td>
            </tr>
            <tr>
                <td>Usia</td>
                <td><input type="text" name="usia"></td>
            </tr>
            <tr>
                <td>Jenis Kelamin</td>
                <td><select name="jk">
                    <option value="L">Laki-laki</option>
                    <option value="P">Perempuan</option>
                </select></td>
            </tr>
            <tr>
                <td>Tanggal Lahir</td>
                <td><input type="date" name="tgllahir"></td>
            </tr>
            <tr>
                <td>Telepon</td>
                <td><input type="text" name="telepon"></td>
            </tr>
            <tr>
                <td><input type="reset" value="Reset"></td>
                <td><input type="submit" value="Submit"></td>
            </tr>
        </table>
    </form>
    
</body>
</html>