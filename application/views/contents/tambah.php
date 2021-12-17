<div class="container">
    <div class="row justify-content-md-center pt-3">
        <div class="col-md-6 border">
            <div class="banner ">
                <h2 class="mt-3 text-center">Add new assignment</h2>
            </div>
            <form class="mt-3" action="" method="POST">
                <div class="form-group">
                    <p>Title</p>
                    <input class="form-control" type="text" name="title" placeholder="Title Assignment" required>
                </div>

                <div class="form-group">
                    <p>Subject</p>
                    <input class="form-control" type="text" name="subject" placeholder="Subject Assignment" required>
                </div>

                <div class="form-group">
                    <p>Deadline</p>
                    <input class="form-control" type="date" name="deadline" required>
                </div>
                <div class="form-group">
                    <label for="exampleFormControlTextarea1">Description</label>
                    <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="description"></textarea>
                </div>
                <button class="btn btn-success" type="submit" name="submit" id="btn-submit">Go</button>
            </form>
        </div>
    </div>
</div>