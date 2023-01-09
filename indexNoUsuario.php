<html>
<title><?php echo $lang['indexTitle'] ?></title>
</head>
<body>
    <header>
        <div class="selectors">
            <div class="dropdown" title="Select language">
                <button><?php echo $lang['selectLang']; ?></button>
                <ul>
                    <li><a href="index.php?lang=en"><div class="flag en"></div><?php echo $lang['lang_en'] ?></a></li>
                    <li><a href="index.php?lang=es"><div class="flag es"></div><?php echo $lang['lang_es'] ?></a></li>
                </ul>
            </div>
            <form action="" method="POST" class="theme-form">
                <button name="tema" value="dark" class="dark"><ion-icon name="moon-outline"></ion-icon></button>
                <button name="tema" value="light" class="light"><ion-icon name="sunny-outline"></ion-icon></button>
            </form>
        </div>
    </header>
    <main>
        <div class="border-animation">
            <div class="indexContainer">
                <h1 class="indexH1 nonClickable"><?php echo $lang['tituloIndex']; ?></h1>
                <p class="indexP nonClickable"><?php echo $lang['indexPreg1']; ?></p>
                <input type="button" value="<?php echo $lang['indexBtnLogin']; ?>" class="btn indexButton" onclick="window.location.href='login.php'">
                <p class="indexP nonClickable"><?php echo $lang['indexPreg2']; ?></p>
                <input type="button" value="<?php echo $lang['indexBtnRegistro']; ?>" class="btn indexButton" onclick="window.location.href='registro.php'">
            </div>
        </div>
    </main>
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
</body>
</html>