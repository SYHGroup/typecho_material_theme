<?php if (!defined('__TYPECHO_ROOT_DIR__')) exit; ?>
</div>
</div>
<footer>
	<div class="footer-bottom">
		<div class="container">
			<div class="pull-left copyright">Copyright &copy; <?php _e(date('Y'));?>&nbsp;<?php $this->options->title(); ?></div>
			<ul class="footer-nav pull-right">
				<li>Powered by <a href="http://typecho.org/" rel="nofollow">Typecho)))</a></li>
				<?php if (!empty($this->options->misc) && in_array('ShowThemeCopyRight', $this->options->misc)): ?>
				<li>Optimized by <a href="http://hanc.cc">HanSon</a></li>
				<?php endif;?>
				<?php if($this->options->miibeian) : ?>
				<li><a href="http://www.miibeian.gov.cn" rel="nofollow"><?php echo $this->options->miibeian; ?></a></li>
				<?php endif; ?>
				<?php if ( !empty($this->options->misc) && in_array('ShowLoadTime', $this->options->misc) ) : ?>
				<li>加载耗时：<?php echo timer_stop(); ?></li>
				<?php endif; ?>
				<?php if ( !empty($this->options->misc) && in_array('ShowCCBY', $this->options->misc) ) : ?>
				<li><a rel="license" href="http://creativecommons.org/licenses/by-sa/4.0/"><img alt="知识共享许可协议" style="border-width:0" src="https://i.creativecommons.org/l/by-sa/4.0/80x15.png" /></a></li>
				<?php endif; ?>
			</ul>
		</div>
	</div>
</footer>
<?php $this->footer(); ?>
<script data-no-instant src="<?php $this->options->themeUrl('js/jquery.min.js'); ?>"></script>
<script data-no-instant src="<?php $this->options->themeUrl('js/bootstrap.min.js'); ?>"></script>
<script data-no-instant src="<?php $this->options->themeUrl('js/material.min.js'); ?>"></script>
<script data-no-instant src="<?php $this->options->themeUrl('js/ripples.min.js'); ?>"></script>
<script data-no-instant src="<?php $this->options->themeUrl('js/instantclick.min.js'); ?>"></script>
<script data-no-instant src="<?php $this->options->themeUrl('js/extra.min.js');?>"></script>
<script data-no-instant>$.material.init();</script>
<script data-no-instant>InstantClick.init();</script>
</body>
</html>
