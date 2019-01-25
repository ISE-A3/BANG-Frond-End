<aside>
    <div class="w3-sidebar w3-bar-block w3-animate-left" style="display:none;z-index:5;background-color: #394a59" id="mySidebar">
        <div id="sidebar" class="nav-collapse ">
            <!-- sidebar menu start-->
            <ul class="sidebar-menu">
                <li class="">
                    <a class="" href="evenement.php" style="border-right: none;">
                        <i class="icon_house_alt" style="font-size: 30px;"></i>
                        <span style="font-size: 25px; padding-top: 10px;">Home</span>
                    </a>
                </li>
                <li class="sub-menu">
                    <a class="" href="evenement.php" style="border-bottom: none;border-right: none;">
                        <span style="font-size: 25px;">Pubquiz</span>
                        <span class="menu-arrow arrow_carrot-down"></span>
                    </a>
                </li>
                <li>
                    <a class="" href="evenement.php" style="border-bottom: none;border-right: none;">
                        <i class="icon_genius"></i>
                        <span>Quizzen</span>
                    </a>
                </li>
                <li>
                    <a class="" href="vragenOverzicht.php" style="border-bottom: none;border-right: none;">
                        <i class="icon_question_alt2"></i>
                        <span>Vragen</span>

                    </a>

                </li>

                <br>

                <li>
                    <a class="" href="evenement.php" style="border-bottom: none;border-right: none;">
                        <span style="font-size: 25px;">Top 100</span>
                        <span class="menu-arrow arrow_carrot-down"></span>
                    </a>

                </li>
                <li>
                    <a class="" href="inzendingen.php" style="border-bottom: none;border-right: none;">
                        <i class="icon_pencil-edit"></i>
                        <span>Inzendingen</span>
                    </a>
                </li>
                <li>
                    <a href="nummers.php" class="" style="border-bottom: none;border-right: none;">
                        <i class="icon_music"></i>
                        <span>Nummers</span>
                    </a>
                </li>
                <br>
                <?php if($_SESSION['gebruiker'] == 'bang_organisator' || $_SESSION['gebruiker'] == 'bang_beheerder' || $_SESSION['gebruiker'] == 'bang_quizmaster') {
                ?>
                <li>
                    <a class="" href="evenement.php?beheerder=1" style="border-bottom: none;border-right: none;">
                        <span style="font-size: 25px;">Beheer</span>
                        <span class="menu-arrow arrow_carrot-down"></span>
                    </a>
                </li>
                    <?php if($_SESSION['gebruiker'] == 'bang_organisator' || $_SESSION['gebruiker'] == 'bang_beheerder'){ ?>
                <li>
                    <a class="" href="evenement.php?beheerder=1" style="border-bottom: none;border-right: none;">
                        <i class="icon_calendar"></i>
                        <span>Evenementen</span>
                    </a>
                </li>
                        <?php } if($_SESSION['gebruiker'] == 'bang_beheerder' || $_SESSION['gebruiker'] == 'bang_quizmaster'){ ?>
                <li>
                    <a class="" href="vragenOverzicht.php?beheerder=1" style="border-bottom: none;border-right: none;">
                        <i class="icon_question_alt2"></i>
                        <span>Vragen</span>
                    </a>
                </li>
                <br>
                <?php } } ?>
                <p style="color: #d0d8df;margin-left: 10px;">Ingelogd als: <?php echo $_SESSION['gebruiker']; ?></p>
                <li>
                    <a class="" href="scripts/uitloggen.php" style="border-bottom: none;border-right: none;">
                        <i class="icon_close_alt2"></i>
                        <span>Uitloggen</span>
                    </a>
                </li>
                <!--
                <li class="sub-menu ">
                    <a href="javascript:;" class="" style="border-bottom: none;border-right: none;">
                        <i class="icon_documents_alt"></i>
                        <span>Pages</span>
                    </a>
                    <ul class="sub">
                        <li><a class="" href="buttons.php">Buttons</a></li>
                        <li><a class="" href="login.php"><span>Login</span></a></li>
                        <li><a class="" href="contact.html"><span>Contact Page</span></a></li>
                        <li><a class="active" href="blank.html">Blank Page</a></li>
                        <li><a class="" href="404.html">404 Error</a></li>
                    </ul>
                </li>
                -->
            </ul>
            <!-- sidebar menu end-->

        </div>
    </div>
</aside>
<script>
    function w3_open() {
        document.getElementById("main").style.marginLeft = "0%";
        document.getElementById("mySidebar").style.width = "11.9%";
        document.getElementById("mySidebar").style.display = "block";
        document.getElementById("openNav").style.display = 'none';
        document.getElementById("mySidebar").style.borderRight = "1px solid #D7D7D7";
        document.getElementById("myOverlay").style.display = "block";
        document.getElementById("closeNav").style.display = "block";
    }
    function w3_close() {
        document.getElementById("main").style.marginLeft = "0%";
        document.getElementById("mySidebar").style.display = "none";
        document.getElementById("openNav").style.display = "inline-block";
        document.getElementById("myOverlay").style.display = "none";
        document.getElementById("closeNav").style.display = "none";
    }
</script>