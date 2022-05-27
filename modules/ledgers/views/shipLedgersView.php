<?php
get_header()
?>
<?php get_sidebar() ?>

<div class="pcoded-content">
    <!-- Page-header start -->
    <div class="page-header">
        <div class="page-block">
            <div class="row align-items-center">
                <div class="col-md-8">
                    <div class="page-header-title">
                        <h5 class="m-b-10">Sổ thống kê tàu</h5>
                        <p class="m-b-0">Sổ thống kê thu chi tàu</p>
                    </div>
                </div>
                <div class="col-md-4">
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item">
                            <a href="?mod=home"> <i class="fa fa-home"></i> </a>
                        </li>
                        <li class="breadcrumb-item"><a href="#">Người dùng</a>
                        </li>
                        <li class="breadcrumb-item"><a href="">Sổ thống kê tàu</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <!-- Page-header end -->
    <!-- Page-header end -->
    <div class="pcoded-inner-content">
        <!-- Main-body start -->
        <div class="main-body">
            <div class="page-wrapper">
                <!-- Page-body start -->
                <div class="page-body">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card">
                                <div class="card-header">
                                    <h5 class="card-title">Sổ thống kê thu chi tàu</h5>
                                    <!-- <p class="card-text">Content</p> -->
                                </div>
                                <div class="card-block">

                                    <nav>
                                        <div class="nav nav-tabs">
                                            <?php
                                            foreach ($ships as $item) {
                                                # code...
                                            ?>
                                                <a href="#tab-step-<?php echo $item['id'] ?>" class="nav-item nav-link <?php if ($item['id'] == get_first_key_of_array($ships)) echo ('active')  ?>" data-toggle="tab"><?php echo ($item['ship_name'] . "-" . $item['name'] . '-' . $item['bank_name'] . " (" . $item['currency_name'] . ")") ?></a>
                                            <?php
                                            }
                                            ?>
                                        </div>
                                    </nav>
                                    <!-- Nội dung -->
                                    <div class="tab-content">
                                        <?php
                                        foreach ($data as $key => $value) {
                                            # code...
                                        ?>
                                            <div class="tab-pane show fade <?php if ($key == '1') {
                                                                                echo ('active');
                                                                            };  ?>" id="tab-step-<?php echo $key ?>">
                                                <div style="display: flex;justify-content: space-between; margin-top: 1rem;">
                                                    <p>Số tiền ban đầu: <span style="font-size: 18px;color: orange;font-weight: 600;"><?php echo (number_format($ships["{$key}"]['amount'], 2, ',', ' ') . " " . $ships["{$key}"]['currency_name'])  ?></span> </p>
                                                    <p>Tổng thu : <span style="font-size: 18px;color: #34e734;font-weight: 600;"><?php echo (number_format($sum_collect["{$key}"]['sum']) . " " . $ships["{$key}"]['currency_name'])  ?></span> </p>
                                                    <p>Tổng chi : <span style="font-size: 18px;color: red;font-weight: 600;"><?php echo (number_format($sum_spend["{$key}"]['sum']) . " " . $ships["{$key}"]['currency_name'])  ?></span> </p>
                                                    <p>Số dư tạm tính: <span style="font-size: 18px;color: #04f;font-weight: 600;"><?php echo (number_format($sum_collect["{$key}"]['sum'] - $sum_spend["{$key}"]['sum']) . " " . $ships["{$key}"]['currency_name']) ?></span></p>
                                                </div>

                                                <!-- form -->
                                                <div class="mb-2 mt-2">
                                                    <form style="display: flex;justify-content: space-between;" method="POST">
                                                        <div style="display: none" class="wp-input">
                                                            <label for="ship">Id</label>
                                                            <input type="text" name="ship" id="ship" value="<?php echo ($key) ?>" class="form-control">
                                                        </div>
                                                        <div style="display: grid" class="wp-input">
                                                            <label for="date">Ngày</label>
                                                            <input type="date" name="date" value="<?php echo set_value('date') ?>" class="form-control">
                                                        </div>
                                                        <div style="display: grid" class="wp-input">
                                                            <label for="cat_id">Loại thu chi</label>
                                                            <select value="<?php echo set_value('cat_id') ?>" id="cat_id" name="cat_id" class="form-control">
                                                                <?php
                                                                foreach ($category as $item) {
                                                                    # code...?
                                                                ?>
                                                                    <option value="<?php echo $item['id'] ?>"><?php echo $item['name'] ?></option>
                                                                <?php
                                                                }
                                                                ?>

                                                            </select>
                                                        </div>
                                                        <div style="display: grid" class="wp-input">
                                                            <label for="money_1">Thu</label>
                                                            <input class="form-control" type="text" id="money_1" name="money_1" value="<?php echo set_value('money_1') ?>" placeholder="Số tiền">
                                                        </div>
                                                        <?php echo form_error('money') ?>
                                                        <div style="display: grid" class="wp-input">
                                                            <label for="money_2">Chi</label>
                                                            <input class="form-control" type="text" id="money_2" name="money_2" value="<?php echo set_value('money_2') ?>" placeholder="Số tiền">
                                                        </div>
                                                        <div style="display: grid" class="wp-input">
                                                            <label for="des">Mô tả</label>
                                                            <input class="form-control" type="text" id="des" name="des" value="<?php echo set_value('des') ?>" placeholder="Mô tả">
                                                        </div>
                                                        <button type="submit" class="btn btn-success" name="btn-submit" id="btn-submit">Thêm</button>
                                                    </form>
                                                </div>
                                                <!-- end form -->
                                                <div class="table-responsive">
                                                    <table class="table table-hover">
                                                        <thead>
                                                            <tr>
                                                                <th>STT</th>
                                                                <th>Ngày</th>
                                                                <th>Loại thu chi</th>
                                                                <th>Thu</th>
                                                                <th>Chi</th>
                                                                <th>Mô tả</th>
                                                                <th>Thao tác</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <?php
                                                            $i = 1;
                                                            foreach ($value as $item) {
                                                            ?>
                                                                <tr>
                                                                    <th scope="row"><?php echo $i ?></th>
                                                                    <td><?php $date = date_create($item['date']);
                                                                        echo date_format($date, 'd-m-Y',)  ?></td>
                                                                    <td><?php echo $item['cat_name'] ?></td>
                                                                    <td><?php if ($item['spend'] == '0') echo number_format($item['money']) ?></td>
                                                                    <td><?php if ($item['spend'] == '1') echo number_format($item['money']) ?></td>

                                                                    <td><?php echo $item['des'] ?></td>
                                                                    <td>
                                                                        <a class="mr-2" title="Sửa" href="?mod=ledgers&action=changeShipLedgers&id=<?php echo ($item['id']) ?>"><i class="fa fa-pencil" aria-hidden="true"></i></a>
                                                                        <a title="Xóa" href="?mod=ledgers&action=deleteShipLedgers&id=<?php echo ($item['id']) ?>" onclick="return confirm('Bạn có chắc chắn muốn xóa!')"><i class="fa fa-trash" aria-hidden="true"></i></a>
                                                                    </td>
                                                                </tr>
                                                            <?php
                                                                $i = $i + 1;
                                                            }
                                                            ?>


                                                        </tbody>
                                                    </table>
                                                </div>

                                            </div>

                                        <?php
                                        }
                                        ?>


                                        <!-- <div class="tab-pane show fade active" id="tab-step-1">
                                            <p>[1] Lorem ipsum dolor sit amet, consectetur adipisicing elit. Natus ipsam qui fugiat ad distinctio suscipit soluta, esse odit praesentium repellat eum cum rerum sint rem, totam error? Est quod facere reiciendis, perferendis sapiente tenetur perspiciatis laudantium pariatur praesentium dolores error eius consectetur deleniti odit dicta quas molestiae possimus dignissimos, velit cupiditate cumque voluptatem. Nihil quae blanditiis, beatae iusto. Quidem dolores obcaecati, neque. Ratione, sapiente? Repudiandae fuga ipsa deleniti. Perspiciatis quibusdam ea quod veniam illum libero, magni quia omnis assumenda similique dignissimos aspernatur quo, facere ullam tempora voluptatum obcaecati, dolor atque. Voluptatibus illo maxime eaque doloremque, perspiciatis itaque consequatur aut atque.</p>
                                        </div>
                                        <div class="tab-pane show fade" id="tab-step-2">
                                            <p>[2] Lorem ipsum dolor sit amet, consectetur adipisicing elit. Adipisci incidunt aspernatur harum aut esse alias eos quo repudiandae, accusamus, magni! Consequuntur, quidem, optio? Ullam corporis accusantium consequatur veniam voluptates quae aperiam totam ex cumque, repellendus quidem qui ratione fuga mollitia voluptatum voluptatem optio nisi maxime deleniti dolorum, harum earum cupiditate.</p>
                                        </div>
                                        <div class="tab-pane show fade" id="tab-step-3">
                                            <p>[3] Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ex numquam ipsa ab at. Inventore numquam totam quos quo obcaecati suscipit repudiandae vel error recusandae, quia consectetur, tempore quaerat, accusamus beatae quidem autem similique explicabo. Nam eaque nulla corporis iure quo ea, voluptas error facere sunt, molestias nihil velit laboriosam id accusantium. Autem labore quisquam impedit, repellat illum repellendus! Nobis quia, officia aperiam laborum exercitationem ex atque eveniet culpa soluta voluptate!</p>
                                        </div> -->

                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


</div>
<?php get_footer() ?>