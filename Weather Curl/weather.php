<?php

$cr=curl_init();

curl_setopt_array($cr, [
    CURLOPT_URL => 'https://www.trthaber.com/ankara-hava-durumu.html',
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_REFERER => 'https://google.com'
]);

$output= curl_exec($cr);

curl_close($cr);
//echo $output;
preg_match_all('@<span class="derece">(.*?)</span>@si', $output, $result);
preg_match_all('@<span class="resim">(.*?)</span>@si', $output, $im);
print_r($result);
print_r($im)
;

?>

<table style="border: blue" border="dotted" >
    <tbody>
    <tr>
        <td>
     <h2>Bugün</h2>
        </td>
        <td>
            <h2>Yarın</h2>
        </td>
        <td>
            <h2>Diğer Gün</h2>
        </td>
    </tr>
    <tr>
        <td>
            <?php echo $im[0][0].$result[0][0]?>
        </td>
        <td>
            <?php echo $im[0][1].$result[0][1]?>
        </td>
        <td>
            <?php echo $im[0][2].$result[0][2]?>
        </td>
    </tr>
    </tbody>
</table>

<ul>
   <li>
       <?php echo $im[0][0]."Bugün Hava : ". $result[0][0] ." Derece"?>
   </li>
    <li>
        <?php echo $im[0][1]."Yarın Hava : ". $result[0][1] ." Derece"?>
    </li>

</ul>
