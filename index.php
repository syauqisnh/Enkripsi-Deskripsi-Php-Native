<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>Sistem Keamanan Data</title>
</head>

<body>
    <div class="container">
        <div class="card card-outline card-primary">
            <div class="card-header text-center bg-warning">
                <h4><b>SYAUQI NUR HIBATULLAH</b></h4>
            </div>
            <div class="card-body">
                <?php
                if (isset($_POST['enkripsi'])) {
                    function cipher($char, $key)
                    {
                        if (ctype_alpha($char)) {
                            $nilai = ord(ctype_upper($char) ? 'A' : 'a');
                            $ch = ord($char);
                            $mod = fmod($ch + $key - $nilai, 26);
                            $hasil = chr($mod + $nilai);
                            return $hasil;
                        } else {
                            return $char;
                        }
                    }
                    function enkripsi($input, $key)
                    {
                        $output = "";
                        $chars = str_split($input);
                        foreach ($chars as $char) {
                            $output .= cipher($char, $key);
                        }
                        return $output;
                    }
                    function dekripsi($input, $key)
                    {
                        return enkripsi($input, 26 - $key); 
                    }
                } else if (isset($_POST['dekripsi'])) {
                    function cipher($char, $key)
                    { 
                        if (ctype_alpha($char)) { 
                            $nilai = ord(ctype_upper($char) ? 'A' : 'a');
                            $ch = ord($char); 
                            $mod = fmod($ch + $key - $nilai, 26);
                            $hasil = chr($mod + $nilai);
                            return $hasil;
                        } else {
                            return $char;
                        }
                    }

                    function enkripsi($input, $key)
                    {
                        $output = "";
                        $chars = str_split($input);
                        foreach ($chars as $char) {
                            $output .= cipher($char, $key);
                        }
                        return $output;
                    }

                    function dekripsi($input, $key)
                    {
                        return enkripsi($input, 26 - $key);
                    }
                }
                ?>

                <form name="skd" method="post">
                    <div class="input-group mb-3">
                        <input type="text" name="plain" class="form-control" placeholder="Input Text">
                    </div>
                    <div class="input-group mb-3">
                        <input type="number" name="key" class="form-control" placeholder="Input Key">
                    </div>
                    <div class="box-footer">
                        <table class="table table-stripped">
                            <tr>
                                <td><input class="btn btn-success" type="submit" name="enkripsi" value="Enkripsi" style="width: 100%"></td>
                                <td><input class="btn btn-danger" type="submit" name="dekripsi" value="Dekripsi" style="width: 100%"></td>
                            </tr>
                        </table>
                    </div>
                </form>
            </div>
            <div class="card-header text-center bg-info">
                <h4><b>HASIL</b></h4>
            </div>
            <div class="card-body">
                <table>
                    <tr>
                        <td> Output: </td>
                        <td><b>
                                <?php if (isset($_POST['enkripsi'])) { 
                                    echo enkripsi($_POST['plain'], $_POST['key']);
                                }
                                if (isset($_POST['dekripsi'])) { 
                                    echo dekripsi($_POST['plain'], $_POST['key']);
                                } ?></b></td>
                    </tr>
                    <tr>
                        <td>Text: </td>
                        <td><b>
                                <?php if (isset($_POST['enkripsi'])) { 
                                    echo dekripsi(enkripsi($_POST['plain'], $_POST['key']), $_POST['key']);
                                }
                                if (isset($_POST['dekripsi'])) { 
                                    echo enkripsi(dekripsi($_POST['plain'], $_POST['key']), $_POST['key']);
                                } ?></b></td>
                    </tr>
                    <tr>
                        <td>Key: </td>
                        <td><b><?php if (isset($_POST['enkripsi'])) { 
                                    echo $_POST['key']; 
                                }
                                if (isset($_POST['dekripsi'])) { 
                                    echo $_POST['key'];
                                } ?></b></td>
                    </tr>
                </table>
            </div>
        </div>
    </div>
    </form>

    <script>
        $(function() {
            $('.select2').select2()

        })
    </script>
</body>

</html>
<style>
    .container {
        width: 40%;
        margin: 87px auto;
    }
    </style>
</body>
