<?php
/**
 * This file is responsible for displaying question page
 * This file can be overridden by creating a anspress directory in active theme folder.
 *
 * @package    AnsPress
 * @license    http://opensource.org/licenses/gpl-license.php  GNU Public License
 * @author    Rahul Aryan <support@anspress.io>
 */
?>
<div id="ap-single" class="ap-q clearfix" itemtype="http://schema.org/Question" itemscope="">	
	<div class="ap-question-lr row">		
		<div class="ap-q-left <?php echo is_active_sidebar( 'ap-qsidebar' ) ? 'col-md-8' : 'col-md-12' ?>">
			<div id="question" role="main" class="ap-content question" data-id="<?php ap_question_the_ID(); ?>">
				<header class="ap-q-head">
					<?php 
						/**
						 * ACTION: ap_before_question_title
						 * @since 	2.0
						 */
						do_action('ap_before_question_content');
					?>
				</header>
				<div class="ap-avatar ap-pull-left">
					<a href="<?php ap_question_the_author_link(); ?>">
						<?php ap_question_the_author_avatar(ap_opt('avatar_size_qquestion') ); ?>
					</a>						
				</div>
				<div class="ap-q-cells clearfix">
					<div class="ap-q-metas clearfix">
						<div class="ap-single-vote ap-pull-right"><?php ap_question_the_vote_button(); ?></div>
						<?php ap_user_display_meta(true, false, true); ?>
						<ul class="ap-display-question-meta ap-ul-inline clearfix">
							<?php echo ap_display_question_metas() ?>
						</ul>
					</div>
					
					<!-- Start ap-content-inner -->
					<div class="ap-q-inner">
						<div class="question-content ap-q-content" itemprop="text">
							<?php the_content(); ?>									
						</div>
						<?php 
							/**
							 * ACTION: ap_after_question_content
							 * @since 	2.0
							 */
							do_action('ap_after_question_content');
						?>

						<?php 
							/**
							 * ACTION: ap_after_question_content
							 * @since 	2.0.0-alpha2
							 */
							do_action('ap_after_question_content');
						?>

						
						<?php ap_post_actions_buttons() ?>

						<?php 
							/**
							 * ACTION: ap_after_question_actions
							 * @since 	2.0
							 */
							do_action('ap_after_question_actions');
						?>
					</div>
					<!-- End ap-content-inner -->
					<?php
						/**
						 * Show question status. i.e. private post, moderate etc
						 */
						ap_question_the_status_description();
					?>
					<?php ap_question_the_comments(); ?>
				</div>		
			</div>
			
			<?php 
				/**
				 * Output list of answers
				 */
				ap_question_the_answers();
			?>				
			<?php ap_question_the_answer_form(); ?>
		</div>
		<?php if ( is_active_sidebar( 'ap-qsidebar' ) ){ ?>
			<div class="ap-question-right col-md-4">
				<div class="ap-question-info">
					<?php dynamic_sidebar( 'ap-qsidebar' ); ?>
				</div>
			</div>
		<?php } ?>
	</div>
</div>
