<?php
/**
 * The template for displaying the footer.
 *
 * Contains footer content and the closing of the
 * #main and #page div elements.
 *
 * @package WordPress
 * @subpackage Doctor_Mole
 * @since Doctor Mole 1.0
 */
?>

</div>
</div>

<div id="footer-wrapper">
    <div id="footer">
        <!-- Newsletter -->
        <div id="newsletter">
            <!-- <p>Signup for our newsletter to get exclusive deals directly to your inbox.</p>

          <form action="#" method="post">
            <div class="news-input"><input type="text" name="newsletter" value="enter your email address" class="maininput input-text"/></div>
            <div class="news-button"><input type="submit" name="submit" value="submit" class="submit-btn"/></div>
          </form>
          -->
        </div>

        <div id="information">
            <!-- About -->
            <div id="about">
                <h2>About Us</h2>

                <p>Doctor mole is dedicated to helping create a greater awareness about the dangers of skin cancer and
                    the damage that the sun can inflict on our skin.</p>
            </div>

            <!-- Links -->
            <div id="links">
                <h2>Useful Links</h2>
                <ul>
                    <li><a href="../www.darksideoftanning.com.au/default.htm">Dark side of tanning</a></li>
                    <li><a href="../www.skmrc.org.au/default.htm">Western Australian Institute for Medical Research</a>
                    </li>
                    <li><a href="../www.cancer.org.au/home.htm">Cancer Council Australia</a></li>
                    <li><a href="../www.cancerinstitute.org.au/cancer-in-nsw/cancer-facts/melanoma">Cancer institute
                            NSW</a></li>
                    <li><a href="www.skincancer.org">Skin Cancer Foundation</a></li>
                </ul>
            </div>

            <!-- Social -->
            <div id="social">
                <h2>Get Social</h2>
                <ul>
                    <li>
                        <a href="http://www.facebook.com/DoctorMole" onClick="recordOutboundLink(this, 'Outbound Links', 'www.facebook.com');return false;"><img src="<?php echo get_template_directory_uri(); ?>/images/icon-facebook.png" height="50" width="50" alt="Facebook" title="Facebook"/></a>
                    </li>
                    <li>
                        <a href="https://twitter.com/Doctor_Mole_App" onClick="recordOutboundLink(this, 'Outbound Links', 'www.twitter.com');return false;"><img src="<?php echo get_template_directory_uri(); ?>/images/icon-twitter.png" height="50" width="50" alt="Twitter" title="Twitter"/></a>
                    </li>
                    <li>
                        <a href="http://www.youtube.com/watch?v=jCQQxzlXW_s" onClick="recordOutboundLink(this, 'Outbound Links', 'www.YouTube.com');return false;"><img src="<?php echo get_template_directory_uri(); ?>/images/icon-youtube.png" height="50" width="50" alt="YouTube" title="YouTube"/></a>
                    </li>
                </ul>
            </div>

            <!-- Contact -->
            <div id="contact">
                <h2>Contact Us</h2>

                <p>doc.mole.app@gmail.com</p>
                <!--
              <form action="">
                <div class="input-box"><input type="text" name="name" id="name" value="Your Name" class="maininput input-text"/></div>
                <div class="input-box"><input type="text" name="email" id="email" value="Email Address" class="maininput input-text"/></div>
                <div class="textarea"><textarea name="message" id="message" class="maininput input-text" cols="10" rows="10">Your Message</textarea></div>
                <div class="button"><input type="submit" name="submit" value="send" class="submit-btn"/></div>
                <div id="response"></div>
              </form>
              -->
            </div>
        </div>
    </div>
</div>
</body>
</html>
