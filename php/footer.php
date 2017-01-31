    <div id="footer">
    <p>
        <?php echo "$deptLngName";?>
        <br /><?php echo "$addressBldg";?>
        <br /><?php echo "$address2";?>
        <br /><?php echo "$addressStreet";?>
        <br />Ann Arbor, MI &nbsp;<?php echo "$addressZip";?>
    </p>

    <p>
        ph: <?php echo "$addressPhone";?>
    </p>

    <p id="ftr-contact">
        e:<a href="mailto:<?php echo strtolower("$deptLngName");?> .department@umich.edu"><?php echo strtolower("$deptLngName");?> .department@umich.edu</a>

        </p>

    <p id="UMlogos"><a href="http://www.umich.edu"><img src=<?php echo URL . "images/michigan.png" ?> alt="University of Michigan" /></a></p>

    <p id="logos"><a href="http://www.lsa.umich.edu"><img src=<?php echo URL . "images/lsa.png" ?> alt= "LSA" /></a></p>
</div> <!-- #footer -->