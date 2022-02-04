<div class="form-body">
    <h4 class="form-section"><i class="fa fa-bullhorn"></i> Kegiatan</h4>

    <div class="row">
        <div class="col-md-6">
            <div class="form-group row">
                <label class="col-md-3 label-control">Nama Organisasi</label>
                <div class="col-md-9">   
                    {{Form::select('id_ormas',$ormas, null, ['class' => 'select2 form-control', 'placeholder' => '-- Pilih Ormas --',  'required' ])}}
                </div>
            </div>

            <div class="form-group row">
                <label class="col-md-3 label-control">Tanggal</label>
                <div class="col-md-9">
                    @if (!empty($data->tanggal))
                    {{Form::text('tanggal', $tanggal, ['class' => 'form-control pickadate', 'placeholder' => 'Tanggal',  'required'])}}
                    @else
                    {{Form::text('tanggal', null, ['class' => 'form-control pickadate', 'placeholder' => 'Tanggal',  'required'])}}
                    @endif
                </div>
            </div>

            <div class="form-group row">
                <label class="col-md-3 label-control">Nama Kegiatan</label>
                <div class="col-md-9">
                    {{Form::text('nama_kegiatan', null, ['class' => 'form-control border-primary', 'placeholder' => 'Nama Kegiatan',  'required'])}}
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group row">
                <label class="col-md-3 label-control">Deskripsi Kegiatan</label>
                <div class="col-md-9">
                    {{Form::textarea('deskripsi', null, ['class' => 'form-control required','rows' => 6, 'placeholder' => 'Deskripsi Kegiatan',  'required' ])}}
                </div>
            </div>
        </div>
    </div>
</div>

@push('js')
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