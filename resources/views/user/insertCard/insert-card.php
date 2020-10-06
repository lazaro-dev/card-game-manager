<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="<?=url()?>/resources/css/style.css">
    <link rel="stylesheet" href="<?=url()?>/resources/views/user/insertCard/style.css">
</head>
<body>  
    <header class="header">
        <a href="../TabelaApresentação/index.html">
            <div class="header__container">
                <div class="header__flip1 header__div">
                    <img src="<?=url()?>/resources/assets/img/Card-From.png" width="30" height="50" />
                </div>
                <div class="header__flip2 header__div">
                    <img src="<?=url()?>/resources/assets/img/Card-Back.jpg" width="30" height="50" />
                </div>
             </div>
        </a>

        <div>
            <a href="<?=url("usuario")?>" class="header__login">Home</a>
            <a href="<?=url("logout")?>" class="header__login">Logout</a>
        </div>
    </header>

    
    <section class="section__form">
        <form action="">
            <div class="form__container">
                <div class="form__box">
                    <label for="ftipo" class="form__label">Tipo de Jogo</label>
                    <input type="text" name="" id="ftipo" class="form__input">
                </div>

                <div class="form__box">
                    <label for="fnome" class="form__label">Nome do Jogo</label>
                    <input type="text" name="" id="fnome" class="form__input">
                </div>

                <div class="form__box">
                    <label for="fcarta" class="form__label">Nome da carta</label>
                    <input type="text" name="" id="fcarta" class="form__input">
                </div>
                
            </div>

            <div class="form__adjuster">
                <!-- Card -->
                <div class="form__card">
                    <div class="form__pepctive">
                        <div class="form__card--from form__cards">
                            <ul class="form__list--card">
                                <li class="form__list">Campo: <span class="form__item">item</span></li>
                                <li class="form__list">Campo: <span class="form__item">item</span></li>
                                <li class="form__list">Campo: <span class="form__item">item</span></li>
                                <li class="form__list">Campo: <span class="form__item">item</span></li>
                                <li class="form__list">Campo: <span class="form__item">item</span></li>
                                <li class="form__list">Campo: <span class="form__item">item</span></li>
                                <li class="form__list">Campo: <span class="form__item">item</span></li>
                                <li class="form__list">Campo: <span class="form__item">item</span></li>
                                <li class="form__list">Campo: <span class="form__item">item</span></li>
                                <li class="form__list">Campo: <span class="form__item">item</span></li>
                                <li class="form__list">Campo: <span class="form__item">item</span></li>
                                <li class="form__list">Campo: <span class="form__item">item</span></li>
                            </ul>
                        </div>
                        <div class="form__card--back form__cards">
                            <p class="form__paragh">Nome da categoria</p>
                            <a href="../CadastroCampo/index.html" class="form__link">Alterar</a>
                        </div>
                    </div>
                </div>

                <!-- Card -->
                <div class="form__card">
                    <div class="form__pepctive">
                        <div class="form__card--from form__cards">
                            <ul class="form__list--card">
                                <li class="form__list">Campo: <span class="form__item">item</span></li>
                                <li class="form__list">Campo: <span class="form__item">item</span></li>
                                <li class="form__list">Campo: <span class="form__item">item</span></li>
                                <li class="form__list">Campo: <span class="form__item">item</span></li>
                                <li class="form__list">Campo: <span class="form__item">item</span></li>
                                <li class="form__list">Campo: <span class="form__item">item</span></li>
                                <li class="form__list">Campo: <span class="form__item">item</span></li>
                                <li class="form__list">Campo: <span class="form__item">item</span></li>
                                <li class="form__list">Campo: <span class="form__item">item</span></li>
                                <li class="form__list">Campo: <span class="form__item">item</span></li>
                                <li class="form__list">Campo: <span class="form__item">item</span></li>
                                <li class="form__list">Campo: <span class="form__item">item</span></li>
                            </ul>
                        </div>
                        <div class="form__card--back form__cards">
                            <p class="form__paragh">Nome da categoria</p>
                            <a href="../CadastroCampo/index.html" class="form__link">Alterar</a>
                        </div>
                    </div>
                </div>

                <!-- Card -->
                <div class="form__card">
                    <div class="form__pepctive">
                        <div class="form__card--from form__cards">
                            <ul class="form__list--card">
                                <li class="form__list">Campo: <span class="form__item">item</span></li>
                                <li class="form__list">Campo: <span class="form__item">item</span></li>
                                <li class="form__list">Campo: <span class="form__item">item</span></li>
                                <li class="form__list">Campo: <span class="form__item">item</span></li>
                                <li class="form__list">Campo: <span class="form__item">item</span></li>
                                <li class="form__list">Campo: <span class="form__item">item</span></li>
                                <li class="form__list">Campo: <span class="form__item">item</span></li>
                                <li class="form__list">Campo: <span class="form__item">item</span></li>
                                <li class="form__list">Campo: <span class="form__item">item</span></li>
                                <li class="form__list">Campo: <span class="form__item">item</span></li>
                                <li class="form__list">Campo: <span class="form__item">item</span></li>
                                <li class="form__list">Campo: <span class="form__item">item</span></li>
                            </ul>
                        </div>
                        <div class="form__card--back form__cards">
                            <p class="form__paragh">Nome da categoria</p>
                            <a href="../CadastroCampo/index.html" class="form__link">Alterar</a>
                        </div>
                    </div>
                </div> 
            </div>
            <button type="submit" class="form__btn">Salvar/Adicionar</button>
        </form>
    </section>
</body>
</html>