<style type="text/css">
<!--
	a:link {text-decoration: none; color: #000000} 
	a:visited {text-decoration: none; color: #000000} 
	a:active {text-decoration: none; color: #000000} 
	a:hover {text-decoration: none; color: #FFAE00} 

	body {
		cursor : default ;
		margin : 0px ;
		scrollbar-face-color : <?=$_color['middle'];?> ; 
		scrollbar-highlight-color : <?=$_color['light'];?> ; 
		scrollbar-shadow-color : <?=$_color['light'];?> ; 
		scrollbar-3dlight-color : <?=$_color['dark'];?> ; 
		scrollbar-arrow-color : <?=$_color['dark'];?> ; 
		scrollbar-track-color : <?=$_color['white'];?> ; 
		scrollbar-darkshadow-color : <?=$_color['dark'];?>;
	}

	h6, .h6 { font-family : "MS sans Serif" ; color : #000000 ; font-size : 14px ; text-indent : 0.0px ; margin : 0px ; font-weight : normal }
	h5, .h5 { font-family : "MS sans Serif" ; color : #000000 ; font-size : 14px ; text-indent : 0.0px ; margin : 0px ; font-weight : bold }
	h4, .h4 { font-family : "MS sans Serif" ; color : #000000 ; font-size : 16px ; text-indent : 0.0px ; margin : 0px ; font-weight : normal }
	h3, .h3 { font-family : "MS sans Serif" ; color : #000000 ; font-size : 16px ; text-indent : 0.0px ; margin : 0px ; font-weight : bold }

	.splitpage {border-bottom: 1px dashed <?=$_color['dark'];?>; border-top: 1px solid <?=$_color['dark'];?>; color: #fff; background-color: #fff; height: 4px}
	.splitdashed {border: 1px dashed <?=$_color['dark'];?>; height: 1px}

	.tabpanel {
		border-left: 1px solid <?=$_color['dark'];?>; 
		border-bottom: 1px solid <?=$_color['dark'];?>; 
		border-right: 1px solid <?=$_color['dark'];?>
	}
	.tabsplit {
		border-bottom: 1px solid <?=$_color['dark'];?>; 
		font-family : "MS sans Serif" ; 
		color : #000000; 
		font-size : 14px
	}
	.tabactive {
		border-left: 1px solid <?=$_color['dark'];?>; 
		border-top: 1px solid <?=$_color['dark'];?>; 
		border-right: 1px solid <?=$_color['dark'];?>; 
		font-family : "MS sans Serif" ; 
		color : #000000; 
		font-size : 14px; 
		font-weight : bold
	}
	.tabitem {
		border: 1px solid <?=$_color['dark'];?>; 
		font-family : "MS sans Serif" ; 
		color : #000000; 
		font-size : 14px; 
		background-color: <?=$_color['bright'];?>
	}

	form {
		margin: 0px;
	}

	form .clear {
		background-color : transparent; 
		border: none;
	}

	form input, select {
		height : 22px ; background-color: #FFFFFF; 
		border: 1px solid <?=$_color['dark'];?>; 
		font-family: "MS Sans Serif" ; font-size: 14px; font-weight: normal
	}

	form .inputerror {
		border: 1px solid <?=$_color['invdark'];?>; 
	}
	form .inputfail {
		border: 1px solid <?=$_color['invdark'];?>; 
	}

	form textarea {
		height : 100px ; background-color: #FFFFFF; 
		border: 1px solid <?=$_color['dark'];?>; 
		font-family: "MS Sans Serif" ; font-size: 14px; font-weight: normal
	}

	form .button {
		height : 18px ; cursor : hand ; 
		background-color : <?=$_color['bright'];?>; 
		border-bottom: 1px solid <?=$_color['dark'];?> ; 
		border-top: 1px solid <?=$_color['dark'];?> ; 
		border-right: 1px solid <?=$_color['dark'];?> ; 
		border-left: 5px solid <?=$_color['dark'];?> ; 
		font-size: 14px; font-family : MS Sans Serif
	}

	form .checkbox {
		background-color : transparent; 
		border: none ; 
	}

	.border1px {border: 1px solid <?=$_color['dark'];?>}
	.border2px {border: 2px solid <?=$_color['dark'];?>}

	.keyinput {background-color : <?=$_color['bright'];?>; }
	.keyfield {background-color : <?=$_color['white'];?>; }

	.keyfielddis {background-color : <?=$_color['bright'];?>; }
	.keytotaldis {background-color : <?=$_color['light'];?>; }

	.keysplit {background-color : <?=$_color['dark'];?>; }
	.keysubmit {background-color : <?=$_color['light'];?>; }

	.datatable .table {background-color : <?=$_color['dark'];?>}

	.datatable th {background-color : <?=$_color['light'];?>; font-family : "MS sans Serif" ; color : #000000; font-size : 14px ; text-indent : 0px ; margin : 0px ; font-weight : normal}

	.datatable td {background-color : <?=$_color['white'];?>; font-family : "MS sans Serif" ; color : #000000; font-size : 14px ; text-indent : 0px ; margin : 0px ; font-weight : normal}


	.datatable .row1 {background-color : <?=$_color['white'];?>; font-family : "MS sans Serif" ; color : #000000; font-size : 14px ; text-indent : 0px ; margin : 0px ; font-weight : normal}
	.datatable .row2 {background-color : <?=$_color['bright'];?>; font-family : "MS sans Serif" ; color : #000000; font-size : 14px ; text-indent : 0px ; margin : 0px ; font-weight : normal}
	.datatable .error {background-color : <?=$_color['invlight'];?>; font-family : "MS sans Serif" ; color : #000000; font-size : 14px ; text-indent : 0px ; margin : 0px ; font-weight : normal}
	.datatable .fail {background-color : <?=$_color['invbright'];?>; font-family : "MS sans Serif" ; color : #000000; font-size : 14px ; text-indent : 0px ; margin : 0px ; font-weight : normal}
	.datatable .total {background-color : <?=$_color['light'];?>; font-family : "MS sans Serif" ; color : #000000; font-size : 14px ; text-indent : 0px ; margin : 0px ; font-weight : bold}

	ul {
		font-family : "MS sans Serif" ;
		font-size : 14px ;
		text-indent : 0.0px ;
	}

	.menu ul{ /*CSS for Simple Tree Menu*/
		margin: 0;
		padding: 0;
	}

	.menu li{ /*Style for LI elements in general (excludes an LI that contains sub lists)*/
		background: white url('./image/tree/title.png') no-repeat left 4px;
		list-style-type: none;
		padding-left: 18px;
		margin-bottom: 2px;
		/*vertical-align: middle;*/
	}

	.menu li.submenu{ /* Style for LI that contains sub lists (other ULs). */
		background: white url('./image/tree/closed.png') no-repeat left 4px;
		cursor: hand !important;
		cursor: pointer !important;
	}


	.menu li.submenu ul{ /*Style for ULs that are children of LIs (submenu) */
		display: none; /*Hide them by default. Don't delete. */
	}

	.menu .submenu ul li{ /*Style for LIs of ULs that are children of LIs (submenu) */
		cursor: default;
	}
    
	p { height:20px; margin-top: 0; margin-bottom: 0; }


/* CSS used here will be applied after bootstrap.css */
.modal-header-success {
    color:#fff;
    padding:9px 15px;
    border-bottom:1px solid #eee;
    background-color: #5cb85c;
    -webkit-border-top-left-radius: 5px;
    -webkit-border-top-right-radius: 5px;
    -moz-border-radius-topleft: 5px;
    -moz-border-radius-topright: 5px;
     border-top-left-radius: 5px;
     border-top-right-radius: 5px;
}
.modal-header-warning {
	color:#fff;
    padding:9px 15px;
    border-bottom:1px solid #eee;
    background-color: #f0ad4e;
    -webkit-border-top-left-radius: 5px;
    -webkit-border-top-right-radius: 5px;
    -moz-border-radius-topleft: 5px;
    -moz-border-radius-topright: 5px;
     border-top-left-radius: 5px;
     border-top-right-radius: 5px;
}
.modal-header-danger {
	color:#fff;
    padding:9px 15px;
    border-bottom:1px solid #eee;
    background-color: #d9534f;
    -webkit-border-top-left-radius: 5px;
    -webkit-border-top-right-radius: 5px;
    -moz-border-radius-topleft: 5px;
    -moz-border-radius-topright: 5px;
     border-top-left-radius: 5px;
     border-top-right-radius: 5px;
}
.modal-header-info {
    color:#fff;
    padding:9px 15px;
    border-bottom:1px solid #eee;
    background-color: #5bc0de;
    -webkit-border-top-left-radius: 5px;
    -webkit-border-top-right-radius: 5px;
    -moz-border-radius-topleft: 5px;
    -moz-border-radius-topright: 5px;
     border-top-left-radius: 5px;
     border-top-right-radius: 5px;
}
.modal-header-primary {
	color:#fff;
    padding:9px 15px;
    border-bottom:1px solid #eee;
    background-color: #428bca;
    -webkit-border-top-left-radius: 5px;
    -webkit-border-top-right-radius: 5px;
    -moz-border-radius-topleft: 5px;
    -moz-border-radius-topright: 5px;
     border-top-left-radius: 5px;
     border-top-right-radius: 5px;
}

.iframe-rwd  {
position: relative;
padding-bottom: 65.25%;
padding-top: 30px;
height: 0;
overflow: hidden;
}
.iframe-rwd iframe {
position: absolute;
top: 0;
left: 0;
width: 100%;
height: 100%;
}

#====================	nav-tabs ==================
 .nav-tabs{
   border-color:#004A00;
   width:100%;
 }

.nav-tabs > li a { 
    border: 1px solid #959494;
    background-color:#d1d1d1; 
    color:#fff;
    }

.nav-tabs > li.active > a,
.nav-tabs > li.active > a:focus,
.nav-tabs > li.active > a:hover{
    background-color:#eeeeee;
    color:#000;
    #border: 1px solid #1A3E5E;
    border-bottom-color: transparent;
    }

.nav-tabs > li > a:hover{
  background-color: #eeeeee !important;
    border-radius: 5px;
    color:#000;

} 

.tab-pane {
    border:solid 1px #d1d1d1;
    border-top: 0; 
    width:100%;
    background-color:#eeeeee;
    padding:5px;
}
#===============	end nav-tabs ================
-->
</style>