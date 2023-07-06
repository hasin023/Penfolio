<div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Comments</h6>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">

                                <table class="table table-bordered table-hover" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th class="text-dark text-center">ID</th>
                                            <th class="text-dark text-center">Author</th>
                                            <th class="text-dark text-center">Comment</th>
                                            <th class="text-dark text-center">Post</th>
                                            <th class="text-dark text-center">Email</th>
                                            <th class="text-dark text-center">Status</th>
                                            <th class="text-dark text-center">Date</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <!-- <tr>
                                            <td class="text-center">1</td>
                                            <td class="text-center">Miles Morales</td>
                                            <td class="text-center">Spiderman - Across the spider-verse</td>
                                            <td class="text-center">Movies</td>
                                            <td class="text-center">Status</td>
                                            <td class="text-center">Image</td>
                                            <td class="text-center">MCU, Spiderman</td>
                                            <td class="text-center">4</td>
                                            <td class="text-center">09-12-2003</td>
                                        </tr> -->


                                    <?php showAllComments(); ?>

                                    </tbody>
                                </table>

                                <?php
                                if (isset($_GET['delete'])) {
                                    $comment_id = $_GET['delete'];

                                    $query = "DELETE FROM comments WHERE comment_id = {$comment_id} ";
                                    $delete_query = mysqli_query($connection, $query);

                                    confirmQuery($delete_query);

                                    header("Location: comments.php");
                                }


                                ?>

                                
                            </div>
                        </div>
                    </div>