<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href='https://cdn.jsdelivr.net/npm/boxicons@2.0.5/css/boxicons.min.css' rel='stylesheet'>
        <link rel="stylesheet" href="assets/css/styles.css">
        <title>PHARMACIE CATY</title>
        <link  rel="icon" href="assets\img\pharmacie.png">
    </head>
    <body>

        <a href="#" class="scrolltop" id="scroll-top">
            <i class='bx bx-chevron-up scrolltop__icon'></i>
        </a>

        <!--========== HEADER ==========-->
        <header class="l-header" id="header">
            <nav class="nav bd-container">
                <a href="#" class="nav__logo">PHARMACIE CATY </a>

                <div class="nav__menu" id="nav-menu">
                    <ul class="nav__list">
                        <li class="nav__item"><a href="index.php" class="nav__link">Acceuil</a></li>
                        <li class="nav__item"><a href="View_Controller/produits.php" class="nav__link">Médicaments</a></li>
                        <li class="nav__item"><a href="View_Controller/parfumerie.php" class="nav__link">Hygiénes & Beauté</a></li>
                        <li class="nav__item"><a href="#services" class="nav__link">Nos Services</a></li>


                        <li><i class='bx bx-moon change-theme' id="theme-button"></i></li>
                    </ul>
                </div>

                <div class="nav__toggle" id="nav-toggle">
                    <i class='bx bx-menu'></i>
                </div>
            </nav>
        </header>

        <main class="l-main">
            <!--========== HOME ==========-->
            <section class="home" id="home">
                <div class="home__container bd-container bd-grid">
                    <div class="home__data">
                        <h1 class="home__title">Pharma Caty</h1>
                        <h2 class="home__subtitle">Soulagez vos maux <br>Chez nous</h2>
                        <a href="View_Controller/inscription.php" class="button">Continuer en tant qu'employé </a>
                    </div>
    
                    <img src="assets\img\top3.png" alt="" class="home__img">
                </div>
            </section>
            

            <section class="about section bd-container" id="about">
                <div class="about__container  bd-grid">
                    <div class="about__data">
                        <span class="section-subtitle about__initial">A Propos de nous </span>
                        <h2 class="section-title about__initial"> Nous sommes dédiés à fournir des services de santé de qualité  <br> à notre communauté.</h2>
                        <p class="about__description">Nous nous efforçons de maintenir des normes élevées en matière de sécurité et de qualité des produits, tout en offrant un service client exceptionnel. Nous sommes fiers de servir notre communauté et nous sommes impatients de vous aider à atteindre vos objectifs de santé.</p>
                        <a href="#" class="button">Voir Plus</a>
                    </div>

                    <img src="assets\img\soins.jpeg" alt="" class="about__img">
                </div>
            </section>

            <!--========== SERVICES ==========-->
            <section class="services section bd-container" id="services">
                <span class="section-subtitle">Offres</span>
                <h2 class="section-title">Nos Services</h2>

                <div class="services__container  bd-grid">
                    <div class="services__content">
                        <svg class="services__img" xmlns="http://www.w3.org/2000/svg">
                            
                        </svg>
                        <h3 class="services__title">Conseils sur les médicaments</h3>
                        <p class="services__description">Nos pharmaciens expérimentés vous donneront des conseils sur les médicaments et les effets secondaires</p>
                    </div>

                    <div class="services__content">
                        <svg class="services__img" xmlns="http://www.w3.org/2000/svg">
                            <g clip-path="url(#clip0)">
                           
                            <defs>
                            <clipPath id="clip0">
                            <rect width="64" height="64" fill="white"/>
                            </clipPath>
                            </defs>
                        </svg>
                        <h3 class="services__title">Soins de santé personnels</h3>
                        <p class="services__description">Nous fournissons des services de soins de santé personnalisés pour répondre aux besoins de chaque client</p>
                    </div>

                    <div class="services__content">
                        <svg class="services__img" xmlns="http://www.w3.org/2000/svg">
                            <g clip-path="url(#clip0)">
                            
                                <defs>
                                <clipPath id="clip0">
                                <rect width="64" height="64" fill="white"/>
                                </clipPath>
                                </defs>
                        </svg>
                        <h3 class="services__title">Livraison à domicile</h3>
                        <p class="services__description">Nous offrons la livraison rapide et fiable de médicaments à domicile pour votre commodité</p>
                    </div>
                </div>
            </section>

            <section class="menu section bd-container" id="menu">
                <span class="section-subtitle">Types de Produits</span>
                <h2 class="section-title">Découvrez une large gamme de produits pharmaceutiques et d'hygiènes Corporels</h2>

                <div class="menu__container bd-grid">
                    <div class="menu__content">
                        <img src="assets\img\medocs.jpg" alt="" class="menu__img">
                        <h3 class="menu__name">Tous types de Médicaments</h3>
                        <span class="menu__detail"></span>
                        <span class="menu__preci">A partir de 100FCFA</span>
                        <a href="View_Controller/produits.php"class="button menu__button"><i class='bx bx-cart-alt'></i></a>
                    </div>

                    <div class="menu__content">
                        <img src="assets\img\parfumerie.jpg" alt="" class="menu__img">
                        <h3 class="menu__name">Parfums Hommes & Femmes & Enfants</h3>
                        <span class="menu__detail"></span>
                        <span class="menu__preci">A partir de 2000FCFA</span>
                        <a href="View_Controller/parfumerie.php" class="button menu__button"><i class='bx bx-cart-alt'></i></a>
                    </div>
                    
                    <div class="menu__content">
                        <img src="assets\img\GelDouche-Ma.jpg" alt="" class="menu__img">
                        <h3 class="menu__name">Beauté & Soins</h3>
                        <span class="menu__detail"></span>
                        <span class="menu__preci">A partir de 5000FCFA</span>
                        <a href="View_Controller/parfumerie.php" class="button menu__button"><i class='bx bx-cart-alt'></i></a>
                    </div>
                </div>
            </section>

        
            <section class="contact section bd-container" id="contact">
                <div class="contact__container bd-grid">
                    <div class="contact__data">
                        <span class="section-subtitle contact__initial"></span>
                        <h2 class="section-title contact__initial">Contactez Nous</h2>
                        <p class="contact__description">Ouverture H24 7j/7</p>
                    </div>

                    <div class="contact__button">
                        <a href="formulaire.php" class="button">Identifiez-vous</a>
                    </div>
                </div>
            </section>
        </main>

        <!--========== FOOTER ==========-->
        <footer class="footer section bd-container">
            <div class="footer__container bd-grid">
                <div class="footer__content">
                    <a href="#" class="footer__logo">Pharma</a>
                    <span class="footer__description">Chez Caty</span>
                    <div>
                        <a href="#" class="footer__social"><i class='bx bxl-facebook'></i></a>
                        <a href="#" class="footer__social"><i class='bx bxl-instagram'></i></a>
                        <a href="#" class="footer__social"><i class='bx bxl-twitter'></i></a>
                    </div>
                </div>

                <div class="footer__content">
                    <h3 class="footer__title">Services</h3>
                    <ul>
                        <li><a href="#" class="footer__link">Livraison</a></li>
                        <li><a href="#" class="footer__link">Tarification</a></li>
                        <li><a href="#" class="footer__link">Commander en Ligne</a></li>
                    </ul>
                </div>

                <div class="footer__content">
                    <h3 class="footer__title">Informations</h3>
                    <ul>
                        <li><a href="#" class="footer__link">Contactez nous</a></li>
                        <li><a href="#" class="footer__link">Politique & Confidentialité</a></li>
                        <li><a href="#" class="footer__link">Conditions de Services</a></li>
                    </ul>
                </div>

                <div class="footer__content">
                    <h3 class="footer__title">Adresse</h3>
                    <ul>
                        <li>Dakar - Sénègal</li>
                        <li>Rue Mermoz 7706</li>
                        <li>33 369 28 20</li>
                        <li>pharmacaty@orange.sn</li>
                    </ul>
                </div>
            </div>

            <p class="footer__copy">&#169; 2020 Bedimcode. All right reserved</p>
        </footer>

        <!--========== SCROLL REVEAL ==========-->
        <script src="https://unpkg.com/scrollreveal"></script>

        <!--========== MAIN JS ==========-->
        <script src="assets/js/main.js"></script>
    </body>
</html>