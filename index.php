<head>
    <link rel="stylesheet" href="static/home.css">
    <link rel="stylesheet" href="static/main.css">
    <link rel="stylesheet" href="static/alerts.css">
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <!-- jQuery library -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <!-- Latest compiled JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <title>Play - Scrabl</title>
</head>

<body>
    <nav>
        <!--<img width="50px" height="50px" src="/scrabl/images/shape.svg">-->
        <a class="main">SCL</a>
        <a href="index.html">Home</a>
        <a href="about.html">About</a>
        <a href="logreg.php">Login/Register</a>
        <a href="account.php">My account/ Stats</a>

    </nav>
    <div class="container">
        <div class="row">
            <?php
            $user = $_GET['username'];
            if (isset($_GET['create'])) {
                $create = true;
            } else {
                $create = false;
            }
            if ($_GET['g'] != 1000 && file_exists("save/gameno" . $_GET['g'] . ".txt") && $create == false) {
                $gameno = $_GET['g'];
            } else if ($create == true) {
                $gameno = rand(1000, 9999);
            } else {
                exit("<h3>Fatal error : unknown; trying to reach game number " . $_GET['g'] . "</h3>");
                echo "c ";
            }

            $dest = '/save/gameno' . $gameno . '.txt';
            const ALPHA = array('a', 'b', 'c', 'd', 'e', 'f', 'g', 'h', 'i', 'j', 'k', 'l', 'm', 'n', 'o', 'p', 'q', 'r', 's', 't', 'u', 'v', 'w', 'x', 'y', 'z');
            ?>
            <?php echo '<script src="static/main.js"></script>'; ?>
            <div class="col-sm-4">
                <div class="uPanel">
                    <?php echo $gameno;
                    echo "<h3 id='gameno'>" . $gameno . "</h3><h3 id='user'>" . $user . "</h3>"; ?>
                    <table class="letters">
                        <?php
                        for ($i = 0; $i < 8; ++$i) {
                            echo '<td onclick="letter(' . $i . ')" class="box noselect letter"  id="j' . $i . '">';
                        }
                        echo '<script>let letters = 0; 
                        for (let i = 0; i < 8; i++) {
                            console.log(i);
                            scramble(i);
                        }   
                        </script>';
                        ?>

                    </table>
                    <div id="errors"></div>
                    <?php echo '<input class="btn btn-success" type="button" value="Finished" onclick="gridW(\'' . $gameno . '\')"></input>' ?>
                </div>       
            </div>

            <div class="col-lg-8">
                <div class="board">
                    <table>
                        <?php
                        for ($line = 0; $line < 15; ++$line) {
                            echo '<tr id="' . $line . '">';
                            for ($col = 0; $col < 15; ++$col) {
                                echo '<td class="box" onclick="boardAdd(' . $line . ',' . $col . ')" id="' . $line . '_' . $col . '" > ';
                            }
                        }
                        ?>
                    </table>
                </div>
            </div>
        </div>
    </div>
<?php if($create == true) { echo "<script>gridW();</script>";} ?>