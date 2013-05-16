<div class="admincontent">    
    <h2>Список песен</h2>
        <table class="playlist">
        <tr valign="top">
            <?php foreach ($items as $type) { ?>
            <td>
                <p class="colored"><?php echo $type['type']?></p>
                <ul>
                    <?php foreach ($type['songs'] as $song) { ?>
                        <li><a href="/admin/playlist/edit/<?php echo $song['id']?>"><?php echo (!empty($song['author']) ? $song['author'] . '&nbsp;&nbsp;-&nbsp;&nbsp;' : '') . $song['title'] . '</b>'?></a></li>
                    <?php } ?>
                </ul>
            </td>
            <?php } ?>
        </tr>
        </table>    
</div>