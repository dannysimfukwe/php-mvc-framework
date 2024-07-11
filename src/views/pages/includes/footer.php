<div class="divider-line"></div>
<div class="footer">
    <div class="container">
        <div class="f-column">
            <span>Company</span>
            <ul class="mobile-hidden">
                <li><a href="/">Home</a></li>
                <li><a href="/how-it-works">About</a></li>
            </ul>
        </div>
        <div class="f-column">
            <span>Resources</span>
            <ul class="mobile-hidden">
                <li><a href="/">Learn how to code</a></li>
                <li><a href="/features">Features</a></li>
            </ul>
            
        </div>
        <div class="f-column">
            <span>Support</span>
            <ul class="mobile-hidden">
                <li><a target="_blank" href="https://faq.trutraderfund.com/">FAQ</a></li>
                <li><a href="/terms-of-service">Terms and conditions</a></li>
                <li><a href="/privacy-policy">Privacy Policy</a></li>
            </ul>
            
        </div>
        <div class="f-column">
            <span>Socials</span>
            <ul class="mobile-hidden">
                <li><a target="_blank" href="https://instagram.com/trutraderfx">Instagram</a></li>
                <li><a target="_blank" href="https://twitter.com/trutraderfx">Twitter</a></li>
                <li><a target="_blank" href="https://discord.gg/e3kX4r23">Discord</a></li>
            </ul>
        </div>
        
    </div>
</div>
</div>
<script type="text/javascript">
    function showHide() {
        var element = document.getElementById("m-menu");
        var logo = document.getElementsByClassName("logo")[1];
        element.classList.toggle("active");
        const menu = document.getElementsByClassName("mobile-menu-items")[0];
        if(element.classList.contains("active")){
            menu.style = "display: flex";
            logo.style = "display: none";
        }else{
            menu.style = "display: none";
            logo.style = "display: block";
        }
    }
</script>

<script src="https://code.jquery.com/jquery-3.6.3.slim.min.js" integrity="sha256-ZwqZIVdD3iXNyGHbSYdsmWP//UBokj2FHAxKuSBKDSo=" crossorigin="anonymous"></script>
<script type="text/javascript">
$(document).ready(function() {
$('.f-column span').on('click', function(){
$('.f-column').removeClass('active');
$(this).siblings().removeClass('mobile-hidden');
$(this).siblings().addClass('shown');
$(this).parent().addClass('active');
});
});
</script>
</body>

