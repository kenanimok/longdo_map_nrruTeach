<?php
Function func_confirm($_title, $_alerts){
	echo '<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">';
	echo '<div class="modal-dialog" role="document">';
    echo '<div class="modal-content">';
      echo '<div class="modal-header">';
        echo '<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>';
        echo '<h4 class="modal-title" id="myModalLabel">Modal title</h4>';
      echo '</div>';
      echo '<div class="modal-body">';
        echo $_alerts;
      echo '</div>';
      echo '<div class="modal-footer">';
        echo '<button type="button" class="btn btn-default" data-dismiss="modal">¡��ԡ</button>';
        echo '<button type="button" class="btn btn-primary">�׹�ѹ</button>';
      echo '</div>';
    echo '</div>';
  echo '</div>';
echo '</div>';
	}
?>
