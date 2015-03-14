<?php
$start = microtime(true);


use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use app\assets\AppAsset;
//use yii\web\Session;

/* @var $this \yii\web\View */
/* @var $content string */

AppAsset::register($this);
$session = Yii::$app->session;
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>"/>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body>

<?php $this->beginBody() ?>
    
    <div id="page_header">
		<div id="page_title" style="padding-top:10px;">Student Information System</div>
		<div id="page_logo"><?= Html::img('@web/images/yiiLogo.jpg', ['width'=>100, 'alt' => 'Yii logo']) ?>
        </div>
    </div>
    <div id="page_head_seperator">
        <div id="page_date">Today is <?php echo date("l, F j, Y",time()-18000); ?></div>
        <div id="page_lastLogin"></div>
        <div id="page_user"><?= Yii::powered() ?></div>
        <!--div id="page_user">Welcomd - Some Username</div-->
    </div>
    
    <?= Breadcrumbs::widget(['links' => isset($this->params['breadcrumbs']) ? 
        $this->params['breadcrumbs'] : [],]) ?>
    <br>            
    <!-- user_main from ait -->
    <table width="99%" align="center">
	<tr valign="top">
        <td valign="top" align="center" width="150">
            <?php
            $links = "";
            if (\Yii::$app->user->isGuest) {
                $links .= Html::a('Login','@web/site/login')."<br>\n";
            } else{
                $links .= Html::a('Users','@web/user')."<br>\n";
                $links .= Html::a('Schools','@web/school')."<br>\n"; 
                $links .= Html::a('Ed centers','@web/ed-center')."<br>\n"; 
                $links .= Html::a('Courses','@web/course')."<br>\n"; 
                $links .= Html::a('Sections','@web/section')."<br>\n"; 
                $links .= Html::a('Custom Scores','@web/custom-score')."<br>\n"; 
                $links .= Html::a('Assignments','@web/assignment')."<br>\n"; 
                $links .= Html::a('Attendance','@web/attendance')."<br>\n";
                $links .= Html::a('Terms','@web/term')."<br>\n";
                $links .= Html::a('Categories','@web/category')."<br>\n";
                $links .= Html::a('School Years','@web/school-year')."<br>\n";
                
                $links .= Html::a('Logout','@web/site/logout')."<br>\n";
            }
            ?>
            <?php echo Yii::$app->helper->make_box("Links",$links); ?>
        </td>
        <td valign="top" align="right">
            <!--h2>Welcome user id(<?php //echo Yii::$app->user->getId(); ?>)</h2-->
            <?php echo Yii::$app->helper->make_box("",$content,'blue'); ?>
            <!-- session variables -->
            <?php $sessVars = Yii::$app->helper->displayArray2($_SESSION); ?>
            <?php echo Yii::$app->helper->make_box("",$sessVars,'yellow'); ?>
        </td>
    </tr>
    </table>

    
    <!--div class="wrap">
        <?php
            NavBar::begin([
                'brandLabel' => 'Q3AIT',
                'brandUrl' => Yii::$app->homeUrl,
                'options' => [
                    'class' => 'navbar-inverse navbar-fixed-top',
                ],
            ]);
            echo Nav::widget([
                'options' => ['class' => 'navbar-nav navbar-right'],
                'items' => [
                    ['label' => 'Home', 'url' => ['/site/index']],
                    ['label' => 'Users', 'url' => ['/user']],
                    ['label' => 'Courses', 'url' => ['/site/contact']],
                    Yii::$app->user->isGuest ?
                        ['label' => 'Login', 'url' => ['/site/login']] :
                        ['label' => 'Logout (' . Yii::$app->user->identity->username . ')',
                            'url' => ['/site/logout'],
                            'linkOptions' => ['data-method' => 'post']],
                ],
            ]);
            NavBar::end();
        ?>

        <div class="container">
            <?= Breadcrumbs::widget([
                'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
            ]) ?>
            <?= $content ?>
        </div>
    </div-->
    <?php $end = microtime(true); ?>
    
    <div id="page_footer">Copyright &copy; 2001 - <?php echo date('Y'); ?> M. Knichel &amp; E. Maassmann<br />
    
	All trademarks and copyrights on this page are owned by their respective owners.<br />
	This page took <?php echo round(($end-$start),4); ?> seconds to create.
    </div>
    
<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
