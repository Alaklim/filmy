<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Wypożyczenia</title>
</head>
<body>
    <?php 
        $serwer = 'localhost';
        $uzytkownik = 'root';
        $haslo = '';
        $baza = 'video'; 

        $poloczenie = mysqli_connect($serwer, $uzytkownik, $haslo, $baza);

    ?>
    <h2>Wypożyczenia klienta Eliza</h2>
    <table border cellpadding="5" rules="all">
        <tr>
            <th>email</th>
            <th>nazwa fimu</th>
            <th>data wypożyczenia</th>
        </tr>
        <?php 
            $kwe1 = mysqli_query($poloczenie, "SELECT CONCAT(customers.first_name, ' ', customers.last_name) as customers_name, email_adress, title AS movie_title, rent_date FROM `customers` INNER JOIN rents ON customers.id = rents.customer_id INNER JOIN movies ON rents.movie_id = movies.id where customer_id=3;");
            while($r = mysqli_fetch_array($kwe1)){
                echo "<tr>
                    <td>{$r['customers_name']}</td>
                    <td>{$r['movie_title']}</td>
                    <td>{$r['rent_date']}</td>
                </tr>";
            };
        ?>
    </table>

    <h2>Filmy "kamienia"</h2>
    <table border cellpadding="5" rules="all">
                <tr>
                    <th>rezyser</th>
                    <th>Tytuł</th>
                    <th>Opis</th>
                </tr>
    <?php 
        $kwe2 = mysqli_query($poloczenie, "SELECT movies.title, movies.description, directors.name AS directors FROM `movies` INNER JOIN directors ON movies.director_id = directors.id where director_id=3");
        while($r1 = mysqli_fetch_array($kwe2)){

            echo "<tr>
                    <td>{$r1['directors']}</td>
                    <td>{$r1['title']}</td>
                    <td>{$r1['description']}</td>
                </tr>";

        };
    ?>
    </table>
    <h2>Gatunek familijny</h2>
    <table border cellpadding="5" rules="all">
        <tr>
            <th>tytuł</th>
            <th>opis</th>
            <th>gatunek</th>
        </tr>
        <?php 
            $kwe3 = mysqli_query($poloczenie, "SELECT movies.title, movies.description, genres.name as genre FROM `movies` INNER JOIN genres ON movies.genre_id = genres.id where genre_id = 1;");
            while($r2 = mysqli_fetch_array($kwe3)){
                echo "<tr>
                        <td>{$r2['title']}</td>
                        <td>{$r2['description']}</td>
                        <td>{$r2['genre']}</td>
                    </tr>";
            };
        ?>
    </table>
    <h2>Filmy wypożyczone z gatunku Akcja</h2>
    <table border cellpadding="5" rules="all">
            <tr>
                <th>gatunek</th>
                <th>klient</th>
                <th>tytuł</th>
                <th>data</th>
            </tr>
        <?php 
            $kwe4 = mysqli_query($poloczenie, "SELECT CONCAT(customers.first_name, '', customers.last_name) AS customers_name, genres.name AS gens_name, movies.title AS movie_title, rents.rent_date FROM customers INNER JOIN rents ON customers.id = rents.customer_id INNER JOIN movies on movies.id = rents.movie_id INNER JOIN genres ON movies.genre_id = genres.id WHERE genres.id = 2;");
            while($r3 = mysqli_fetch_array($kwe4)){
                echo "<tr>
                        <td>{$r3['gens_name']}</td>
                        <td>{$r3['customers_name']}</td>
                        <td>{$r3['movie_title']}</td>
                        <td>{$r3['rent_date']}</td>
                    </tr>";
            }
        ?>
    </table>
</body>
</html> 