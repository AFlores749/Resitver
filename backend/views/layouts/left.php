<aside class="main-sidebar">

    <section class="sidebar">

        <!-- Sidebar user panel -->
        <div class="user-panel">
            <div class="pull-left image">
                <img src="<?= Yii::$app->request->baseUrl . '/' . Yii::$app->user->identity->Img_Perfil?>" class="img-circle" alt="User Image"/>
            </div>
            <div class="pull-left info">
                <p><?= Yii::$app->user->identity->Nombre_Completo?></p>
                <p><?= Yii::$app->user->identity->Num_Control?></p>

                <!--<a href="#"><i class="fa fa-circle text-success"></i> Online</a> -->
            </div>
        </div> -

        <!-- search form --><!--
        <form action="#" method="get" class="sidebar-form">
            <div class="input-group">
                <input type="text" name="q" class="form-control" placeholder="Buscar personas."/>
              <span class="input-group-btn">
                <button type='submit' name='search' id='search-btn' class="btn btn-flat"><i class="fa fa-search"></i>
                </button>
              </span>
            </div>
        </form>
        <!-- /.search form -->  

        <?= dmstr\widgets\Menu::widget(
            [
                'options' => ['class' => 'sidebar-menu'],
                'items' => [
                    ['label' => 'Menu', 'options' => ['class' => 'header']],
                    ['label' => 'Inicio', 'url' => ['/posts/index']],
                    ['label' => 'Mi perfil', 'url' => ['/user/view', 'id' => Yii::$app->user->identity->id]],
                    ['label' => 'Mis posts', 'url' => ['/posts/misposts']],
                    ['label' => 'Seguidos', 'url' => ['/user/showfollowed']],
                    ['label' => 'Seguidores', 'url' => ['/user/showfollowers']],
                    ['label' => 'Usuarios registrados', 'url' => ['/user/all']],
//                    ['label' => 'Buscar Personas', 'url' => ['/user/search']],
                    //['label' => 'Mi calendario', 'url' => ['/reportes/index']],
                    //['label' => 'Mis documentos', 'url' => ['/documentacion/index']],
                  ],
            ]
        ) ?>



    </section>

</aside>
