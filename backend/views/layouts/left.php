<aside class="main-sidebar">

    <section class="sidebar">

        <!-- Sidebar user panel -->
        <div class="user-panel">
            <div class="pull-left image">
                <img src="<?= Yii::$app->user->identity->Img_Perfil?>" class="img-circle" alt="User Image"/>
            </div>
            <div class="pull-left info">
                <p><?= Yii::$app->user->identity->Nombre_Completo?></p>

                <!--<a href="#"><i class="fa fa-circle text-success"></i> Online</a> -->
            </div>
        </div> -

        <!-- search form --><!--
        <form action="#" method="get" class="sidebar-form">
            <div class="input-group">
                <input type="text" name="q" class="form-control" placeholder="Buscar..."/>
              <span class="input-group-btn">
                <button type='submit' name='search' id='search-btn' class="btn btn-flat"><i class="fa fa-search"></i>
                </button>
              </span>
            </div>
        </form> -->
        <!-- /.search form -->  

        <?= dmstr\widgets\Menu::widget(
            [
                'options' => ['class' => 'sidebar-menu'],
                'items' => [
                    ['label' => 'Menu', 'options' => ['class' => 'header']],
                    ['label' => 'Inicio', 'url' => ['/site/index']],
                    ['label' => 'Mi perfil', 'url' => ['/user/view']],
                    ['label' => 'Mi calendario', 'url' => ['/site/index']],
                    ['label' => 'Mis documentos', 'url' => ['/site/index']],
                  ],
            ]
        ) ?>



    </section>

</aside>
