<?php if (!defined('__TYPECHO_ROOT_DIR__')) exit;$this->comments()->to($comments); ?>
<div class="row">
	<div data-no-instant id="comments">
		<?php if($this->allow('comment')): ?>
		<div class="alert alert-info"><span id="commentCount"><?php $this->commentsNum(_t('暂时没有评论'),_t('已有 %d 条评论')); ?></span></div>
		<?php $comments->listComments();$comments->pageNav('&laquo;', '&raquo;'); ?>
		<div id="<?php $this->respondId(); ?>" class="respond">
			<div class="respond panel panel-default">
				<div class="panel-body">
				<div class="cancel-comment-reply"><?php $comments->cancelReply(); ?></div>
					<h3 id="response">添加新评论</h3>
					<form method="post" action="<?php $this->commentUrl() ?>" id="comment_form" class="form-horizontal">
						<?php if($this->user->hasLogin()): ?>
							<p>已以 <a href="<?php $this->options->adminUrl(); ?>"><?php $this->user->screenName(); ?></a> 身份登陆。<a href="<?php $this->options->logoutUrl(); ?>" title="Logout"> 登出 &raquo;</a></p>
						<?php else: ?>
							<div class="form-group">
								<label for="author" class="col-sm-2 control-label required">昵称</label>
								<div class="col-sm-9">
									<div class="form-control-wrapper">
										<input type="text" name="author" class="form-control text empty" size="35" value="<?php $this->remember('author'); ?>" />
										<span class="material-input"></span>
									</div>
								</div>
							</div>
							<div class="form-group">
								<label for="mail" class="col-sm-2 control-label required">邮箱</label>
								<div class="col-sm-9">
									<div class="form-control-wrapper">
										<input type="email" name="mail" class="form-control text empty" size="35" value="<?php $this->remember('mail'); ?>" />
										<span class="material-input"></span>
									</div>
								</div>
							</div>
							<div class="form-group">
								<label for="url" class="col-sm-2 control-label required">网站</label>
								<div class="col-sm-9">
									<div class="form-control-wrapper">
										<input type="url" name="url" class="form-control text empty" size="35" value="<?php $this->remember('url'); ?>" placeholder="http://"/>
										<span class="material-input"></span>
									</div>
								</div>
							</div>
							<?php endif; ?>
							<div class="form-group">
								<label for="textarea" class="col-sm-2 control-label required">内容</label>
								<div class="col-sm-9">
									<div class="form-control-wrapper">
										<textarea rows="9" cols="50" name="text" id="textarea" class="form-control textarea  empty" required=""<?php if ( !empty($this->options->misc) && in_array('ShowCCBY', $this->options->misc) ) : ?>placeholder="除非特别注明，本站内容采用 知识共享署名-非商业性使用-相同方式共享 4.0 国际许可协议 进行许可。"<?php endif; ?>></textarea>
										<span class="material-input"></span>
									</div>
								</div>
							</div>
							<div class="form-group">
								<div class="col-sm-offset-2 col-sm-5">
								<button type="submit" id="submit" class="btn btn-success btn-raised submit">提交评论</button>
								<?php if(class_exists('Smilies_Plugin')){Smilies_Plugin::output();} ?>
								</div>
							</div>
						</form>
					</div>
				</div>
			</div>
		<?php else: ?>
			<div class="alert alert-warning"><span id="commentCount">评论已关闭</span></div>
		<?php endif; ?>
	</div>
</div>
