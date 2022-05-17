
<?php
    $sql = "SELECT * FROM db_article t1 INNER JOIN db_type_article t2 ON t1.t_article_id = t2.t_article_id";
    $query = mysqli_query($conn, $sql);
?>
<div class="row justify-content-between">
    <div class="col-auto">
        <h1 class="app-page-title mb-0">ข้อมูลบทความ</h1>
    </div>
</div>
<hr class="mb-4">
<div class="row g-4 settings-section">
<div class="col-12 col-md-12">
    <div class="app-card app-card-settings shadow-sm p-4">                      
        <div class="app-card-body">
            <a href="?page=<?=$_GET['page']?>&function=insert" class="btn btn-primary text-white ">เพิ่มข้อมูลบทความ</a>
            <table class="table table-hover table-bordered" id="tableadmin">
                <thead >
                    <tr>
                        <th scope="col">จำนวน</th>
                        <th scope="col">รูปภาพ</th>
                        <th scope="col">ประเภทบทความ</th>
                        <th scope="col">ชื่อบทความ</th>
                        <th scope="col">ยอดการอ่าน</th>
                        <th scope="col">วันที่เพิ่ม</th>
                        <th scope="col">เมนู</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        $i = 1;
                        foreach($query as $data):
                    ?>
                        <tr>
                            <td class="align-middle"><?=$i++?></td>
                            <td class="align-middle"><img src="upload/article/<?=$data['article_pic']?>" width="100"></td>
                            <td class="align-middle"><?=$data['t_article_name']?></td>
                            <td class="align-middle"><?=$data['article_name']?></td>
                            <td class="align-middle"><?=$data['article_view']?></td>
                            <td class="align-middle"><?=$data['article_date']?></td>
                            <td class="align-middle">
                                <a href="?page=<?=$_GET['page']?>&function=update&id=<?=$data['article_id']?>" class="btn btn-sm btn-warning">แก้ไข</a>
                                <a href="?page=<?=$_GET['page']?>&function=delete&id=<?=$data['article_id']?>" onclick="return confirm('ลบข้อมูลบทความ <?=$data['t_article_name']?> ?')" 
                                class="btn btn-sm btn-danger">ลบ</a>
                            </td>
                        </tr>
                    <?php endforeach;?>
                </tbody>
             </table>
        </div><!--//app-card-body-->
    </div><!--//app-card-->
</div>
</div><!--//row-->

<?php
mysqli_close($conn)
?>
