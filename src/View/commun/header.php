<header>
	<div class="navigation">
        <div class="logo_fk">
            <img src="https://www.cpas.grez-doiceau.be/epn/images/logo-facebook.png/@@images/e089d70f-51fe-4bc3-9fb4-50af5d51ef69.png" alt="">
            <span>Fakebook</span>
        </div>

        <div class="bar_search">
            <form action="/search-bar" method="GET">
                <input type="search" name="searchBar" placeholder="Chercher un ami" >
                <input type="submit" placeholder="Chercher" class="search" value="search">
            </form>

            <div class="searchResults">
                <ul>
                    <?php while($results = $searchBar->fetch()){ ?>
                        <li> <?= $results['surName']?> <?= $results['nom']?> <?= $results['pseudo']?></li>
                    <?php } ?>
                </ul>
            </div>
        </div>


		<div class="pseudoUser">
			<?= $_SESSION['pseudo']; ?>
			<img src="<?= $_SESSION['photo']; ?>" alt="">
		</div>

		<a href="/logout"><button class="logout">Déconnexion</button></a>
	</div>
</header>

