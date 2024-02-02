<?php
    // サンプルなのでDBは使わず配列で
    $php_array = [
        [ 'author' => 'User A', 'quote' => 'This person is a User A', 'image' => 'ph1.jpg'],
        [ 'author' => 'User B', 'quote' => 'This person is a User B', 'image' => 'ph2.jpg'],
        [ 'author' => 'User C', 'quote' => 'This person is a User C', 'image' => 'ph3.jpg'],
        [ 'author' => 'User A', 'quote' => 'This person is a User A', 'image' => 'ph1.jpg'],
        [ 'author' => 'User B', 'quote' => 'This person is a User B', 'image' => 'ph2.jpg'],
        [ 'author' => 'User C', 'quote' => 'This person is a User C', 'image' => 'ph3.jpg'],
        [ 'author' => 'User A', 'quote' => 'This person is a User A', 'image' => 'ph1.jpg'],
        [ 'author' => 'User B', 'quote' => 'This person is a User B', 'image' => 'ph2.jpg'],
        [ 'author' => 'User C', 'quote' => 'This person is a User C', 'image' => 'ph3.jpg'],
    ];

    // phpのデータをJSONにする
    $php_json = json_encode($php_array);
?>

<!DOCTYPE html>
<html>
    <head>
        <title>FoldScroll</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no, minimal-ui">
        <link href="https://fonts.googleapis.com/css?family=Play:400,700" rel="stylesheet" type="text/css">
        <link rel="stylesheet" href="css/style.css">
    </head>
    <body>

        <div class="quotes"></div>

        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.8.0/jquery.min.js"></script>
        <script src="js/foldscroll.js"></script>
        <script type="text/javascript">
            let quotes = <?php echo $php_json; ?>;

            $(function() {
                // foldscroll
                let limit = 10;
                let $container = $( '.quotes' );
                for ( let i = 0, n = Math.min( limit, quotes.length ); i < n; i++ ) {
                    $container.append(
                        '<div class="article">' +
                            '<div class="article-left">' +
                                '<img src="./img/' + quotes[i].image + '">' +
                            '</div>' +
                            '<div class="article-right">' +
                                '<p>' + quotes[i].quote + '</p>' +
                                '<p class="author">' + quotes[i].author + '</p>' +
                            '</div>' +
                        '</div>');
                }
                $container.foldscroll({
                    perspective: 900,
                    margin: '220px'
                });
            });
        </script>
    </body>
</html>
