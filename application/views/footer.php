 </div>
      </div>
   </div>
</div>

<style>
vertical-nav ul li ul {
    display:none;
    list-style-type:none;
    width:125px;
    padding:0px;
    margin-top:3px;
    margin-left:-5px;
}
vertical-nav ul li:hover ul {
    display:block;
}
vertical-nav ul li:hover ul li {
    background-color:#555555;
    width:125px;
    height:30px;
    display:inline-block;
}
vertical-nav ul li ul li:hover {
    background-color:#333333;
}
vertical-nav ul li ul li a {
    color:#FFF;
    text-decoration:underline;
}
vertical-nav ul li ul li a:hover {
    text-decoration:none;
}
.vertical-nav li ul {
    z-index: 9;	
    display: none;
    padding: 0;
}
.vertical-nav li:hover ul {
    display: block;
}

.vertical-nav .sub-menu li
{
    position: relative;
    display: block;
    top: 0;
    left: 100%;
    width: 100%;
    min-width: 180px;
    white-space: nowrap;
    z-index:1;
}
.vertical-nav .sub-menu li a
{
    display:inline-block;
     font-size: 14px;
}

.vertical-nav .sub-menu {
	position: absolute;
    top: 0;
    left: 100%;
	margin: 0;
}
.vertical-nav .sub-menu li {
	position: initial;
    display: block;
    top: 0;
    left: 100%;
    width: initial;
    min-width: 180px;
    white-space: nowrap;
    z-index: 1;
    margin: 0;
    padding: 5px 0;
    border: none;
    clear: both;
    background-color: #fff;
    padding: 0 20px;
    padding-top: 5px;
    padding-bottom: 5px;	
}
.vertical-nav .sub-menu li:hover {
    color: #40a047;
}

.nav.vertical-megamenu > li {
	cursor: pointer;
    list-style: none;
    padding: 0 20px;
    padding-top: 5px;
    padding-bottom: 5px;
    font-size: 15px;
}
.nav.vertical-megamenu > li:first-child {
	background: #40a047;
    color: #fff;
	padding-top:10px;
	padding-bottom:10px;
}
.nav.vertical-megamenu > li:hover > a {
    color: #40a047;
}
.item-link i {
    float: right;
    display: inline-block;
	margin: 0;
} 
.elementor-section.elementor-section-boxed > .elementor-container.elementor-menu-slide {
	max-width: 1330px;
	margin-top:30px;
	margin-bottom: 30px;
}	

ul.nav.vertical-megamenu.vertical-nav {
    border-radius: 5px;
    background: #fff;
    box-shadow: 10px 11px 38px 0px rgba(0, 0, 0, 0.1);
	height: 400px;
    padding: 0;	
}
.flexslider .slides img {
    height: 400px;
    object-fit: cover;
	border-radius: 5px;
}
.flexslider {
    margin-bottom: 20px;
}
</style>

</body>
</html>