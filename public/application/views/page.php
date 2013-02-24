<div class="pagelist">
    <?php echo $this->pagination->create_links();  ?>
    <span>
        <?php
        $end_num  =  $this->pagination->total_rows%$this->pagination->per_page; //取余数，显示最后一页当前条函数
        $end =  floor($this->pagination->total_rows/$this->pagination->per_page);//舍去法，求的倍数
        if($this->uri->segment(4) == $end*$this->pagination->per_page)
            echo $end_num;
        else
            echo $this->pagination->per_page;
        ?>/<?php echo $this->pagination->total_rows;?>条</span>
</div>