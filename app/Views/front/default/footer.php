<footer id="footer" class="dark">
	<div class="container">
		<div class="footer-widgets-wrap">
			<div class="row col-mb-50">
				<div class="col-lg-3 order-last order-lg-first">
					<div class="widget clearfix">
						 
						<p>Thanks for visiting Reeva for Properties. Your dream home is only a click away. Reach out to us today to begin your quest for the ideal property. </p>
						<div class="line" style="margin: 30px 0;"></div>
						<p class="ls1 fw-light" style="opacity: 0.6; font-size: 13px;">Copyrights &copy; 2024 | All Rights Reserved |     Design By :-   <a  target="_blank" href="https://www.pctiltd.com/">PCTI Ltd</a>.</p> 
					</div>
				</div>
				<div class="col-lg-9">
					<div class="row col-mb-50">
						<div class="col-md-4">
							<h4 class="ls1 fw-normal text-uppercase">Links</h4>
							<div class="row">
								<div class="col-12 bottommargin-sm widget_links  ">
									<ul>
										<li><a href="<?= site_url('/vision')?>">Vision</a></li>
										<li><a href="<?= site_url('/about_us')?>">About us</a></li>
										<li><a href="<?= site_url('/contact')?>">Contact</a></li> 
										<li><a href="<?= site_url('/terms')?>">Terms & Condition</a></li> 
									</ul>
								</div>  
							</div>
						</div>
						<div class="col-md-4">
							<div class="widget clearfix">
  
								<h4 class="ls1 fw-normal text-uppercase">Contact us</h4>
								<div>
									<address>
										<i class="icon-home  me-2 "    ></i><strong>Address:</strong><br>
										KH.no.325, G.no D-13, Additional Floor Portion 2nd Floor, Guru Nanak Dev Colony Village, Bhalswa Dairy, Delhi 110042
									Nr. Reeva Little Angel School.<br>
									</address>
									<i class="icon-line-phone  me-2"  ></i><strong>Phone:</strong></abbr><br> 8800885758 , 8750885758  
								</div>

							</div>

						</div>
						<div class="col-md-4">
							<h4 class="ls1 fw-normal text-uppercase">Subscribe us on Email</h4>
							<!--<div class="bottommargin-sm clearfix">
								<a href="#" class="social-icon si-colored si-small si-rounded si-facebook" title="Facebook">
									<i class="icon-facebook"></i>
									<i class="icon-facebook"></i>
								</a>
								<a href="#" class="social-icon si-colored si-small si-rounded si-twitter" title="Twitter">
									<i class="icon-twitter"></i>
									<i class="icon-twitter"></i>
								</a>
								<a href="#" class="social-icon si-colored si-small si-rounded si-instagram" title="Instagram">
									<i class="icon-instagram"></i>
									<i class="icon-instagram"></i>
								</a> 
							</div>-->
							<div> 
								<form  action="<?= site_url('form/subscribe');?>" method="post" class="mb-0 form-submit">
									<input type="email"  name="email" class="sm-form-control not-dark " placeholder="Enter your Email">
									<input type="hidden" name="<?= csrf_token();?>" value="<?= csrf_hash();?>" id="csrf-token">
									<button class="button button-3d button-black mx-0" style="margin-top: 15px;" type="submit"   data-loader="button"  >Subscribe</button>
								</form>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</footer>