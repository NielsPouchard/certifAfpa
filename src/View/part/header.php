<header>
    <?php $user = $_SESSION['user']; ?>
    <div class="<?php if (null !== $user['pseudo']) : ?>navigation<?php else: ?>connection<?php endif; ?>">
        <div class="logo_fk">
<!--            <img src="https://www.cpas.grez-doiceau.be/epn/images/logo-facebook.png/@@images/e089d70f-51fe-4bc3-9fb4-50af5d51ef69.png" height="50" alt="">-->
            <span>Fakebook</span>
        </div>

        <?php if (isset($_SESSION['user'])) : ?>

            <div class="bar_search">
                <form action="/search-bar" method="GET">
                    <input type="search" name="searchBar" placeholder="Chercher un ami" >
                    <input type="submit" placeholder="Chercher" class="search" value="search">
                </form>

                <?php if (isset($searchBar)): ?>
                    <div class="searchResults">
                        <ul>
                            <?php while($results = $searchBar->fetch()){ ?>
                                <li> <?= $results['surName']?> <?= $results['nom']?> <?= $results['pseudo']?></li>
                            <?php } ?>
                        </ul>
                    </div>
                <?php endif; ?>
            </div>
            <div class="pseudoUser">
                <?= $user['pseudo'] ?>
                <img src="<?= $user['photo'] ?>" alt="">
            </div>
            <a href="/logout"><button class="logout">Déconnexion</button></a>

        <?php else : ?>

            <div class="login">
                <form action="/login" method="POST">
                    <input type="email" name="email" placeholder="email*">
                    <input type="password" name="mdp" placeholder="password*">
                    <input type="submit" name="connexion" placeholder="Connexion" id="connexion">
                </form>

                <div class="forget_password">
                    <a href="/forgotPassword">Information de compte oublié ?</a>
                </div>
            </div>

        <?php endif; ?>
    </div>
</header>
