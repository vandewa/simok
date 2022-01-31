<div class="form-body">
    <h4 class="form-section"><i class="fa fa-bullhorn"></i> Kegiatan</h4>

    <div class="row">
        <div class="col-md-6">
            <div class="form-group row">
                <label class="col-md-3 label-control">Nama Organisasi</label>
                <div class="col-md-9">   
                    {{Form::select('id_ormas',$ormas, null, ['class' => 'select2 form-control', 'placeholder' => '-- Pilih Ormas --', ])}}
                </div>
            </div>

            <div class="form-group row">
                <label class="col-md-3 label-control">Tanggal</label>
                <div class="col-md-9">
                    @if (!empty($data->tanggal))
                    {{Form::text('tanggal', $tanggal, ['class' => 'form-control daterange-single', 'placeholder' => 'Tanggal',])}}
                    @else
                    {{Form::text('tanggal', null, ['class' => 'form-control daterange-single', 'placeholder' => 'Tanggal',])}}
                    @endif
                </div>
            </div>

            <div class="form-group row">
                <label class="col-md-3 label-control">Nama Kegiatan</label>
                <div class="col-md-9">
                    {{Form::text('nama_kegiatan', null, ['class' => 'form-control border-primary', 'placeholder' => 'Nama Kegiatan',])}}
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group row">
                <label class="col-md-3 label-control">Deskripsi Kegiatan</label>
                <div class="col-md-9">
                    {{Form::textarea('deskripsi', null, ['class' => 'form-control required','rows' => 6, 'placeholder' => 'Deskripsi Kegiatan' ])}}
                </div>
            </div>
        </div>
    </div>
</div>

@if (empty($foto))
  <div class="input-field">
    <label class="active">Foto Kegiatan </label>
    <div class="input-images-1" style="padding-top: .5rem;"></div>
</div>
@else
<label class="active">Foto Kegiatan </label>
        <div class="row">
            <!-- Multiple titles -->
        @foreach($foto as $data)
        <div class="card col-2">
        <div class="card-header d-flex justify-content-between">
        </div>

        <div class="card">
        <a href="{{asset('uploads/'.$data->images) }}" target="_blank">
        <img class="img-fluid" src="{{asset('uploads/'.$data->images) }}">
        </a>
        </div>

        <div class="card bg-transparent d-flex justify-content-between">

        {{-- <a href="{{route('posting.gambar.hapus',$data->id_attachment)}}" type="button"  class="btn btn-danger rounded-round" onclick="return confirm('Are you sure?')">Delete</a> --}}
            <!-- class="deletee" untuk sweetalert -->
        </div>
        </div>
        @endforeach
        <!-- /multiple titles -->
        </div>
@endif

  
<div class="form-actions right">
    <button type="button" class="btn btn-warning mr-1">
        <i class="feather icon-x"></i> Cancel
    </button>
    <button type="submit" class="btn btn-primary">
        <i class="fa fa-check-square-o"></i> Save
    </button>
</div>
</form>

@push('js')
{{-- 
<script type="text/javascript" src="https://code.jquery.com/jquery-3.2.1.min.js"
        integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4=" crossorigin="anonymous"></script> --}}
<script src="{{ asset('css/image-uploader.min.js')}}"></script>
<script>
  $(function () {

      $('.input-images-1').imageUploader();

      // let preloaded = [
      //     {id: 1, src: 'https://picsum.photos/500/500?random=1'},
      //     {id: 2, src: 'https://picsum.photos/500/500?random=2'},
      //     {id: 3, src: 'https://picsum.photos/500/500?random=3'},
      //     {id: 4, src: 'https://picsum.photos/500/500?random=4'},
      //     {id: 5, src: 'https://picsum.photos/500/500?random=5'},
      //     {id: 6, src: 'https://picsum.photos/500/500?random=6'},
      // ];

      $('.input-images-2').imageUploader({
          preloaded: preloaded,
          imagesInputName: 'photos',
          preloadedInputName: 'old'
      });

      $('form').on('submit', function (event) {

          // Stop propagation
          event.preventDefault();
          event.stopPropagation();

          // Get some vars
          let $form = $(this),
              $modal = $('.modal');

          // Set name and description
          $modal.find('#display-name span').text($form.find('input[id^="name"]').val());
          $modal.find('#display-description span').text($form.find('input[id^="description"]').val());

          // Get the input file
          let $inputImages = $form.find('input[name^="images"]');
          if (!$inputImages.length) {
              $inputImages = $form.find('input[name^="photos"]')
          }

          // Get the new files names
          let $fileNames = $('<ul>');
          for (let file of $inputImages.prop('files')) {
              $('<li>', {text: file.name}).appendTo($fileNames);
          }

          // Set the new files names
          $modal.find('#display-new-images').html($fileNames.html());

          // Get the preloaded inputs
          let $inputPreloaded = $form.find('input[name^="old"]');
          if ($inputPreloaded.length) {

              // Get the ids
              let $preloadedIds = $('<ul>');
              for (let iP of $inputPreloaded) {
                  $('<li>', {text: '#' + iP.value}).appendTo($preloadedIds);
              }

              // Show the preloadede info and set the list of ids
              $modal.find('#display-preloaded-images').show().html($preloadedIds.html());

          } else {

              // Hide the preloaded info
              $modal.find('#display-preloaded-images').hide();

          }

          // Show the modal
          $modal.css('visibility', 'visible');
      });

      // Input and label handler
      $('input').on('focus', function () {
          $(this).parent().find('label').addClass('active')
      }).on('blur', function () {
          if ($(this).val() == '') {
              $(this).parent().find('label').removeClass('active');
          }
      });

      // Sticky menu
      let $nav = $('nav'),
          $header = $('header'),
          offset = 4 * parseFloat($('body').css('font-size')),
          scrollTop = $(this).scrollTop();

      // Initial verification
      setNav();

      // Bind scroll
      $(window).on('scroll', function () {
          scrollTop = $(this).scrollTop();
          // Update nav
          setNav();
      });

      function setNav() {
          if (scrollTop > $header.outerHeight()) {
              $nav.css({position: 'fixed', 'top': offset});
          } else {
              $nav.css({position: '', 'top': ''});
          }
      }
  });
</script>

@endpush