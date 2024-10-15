@csrf <!--para que sea más seguro y lavarel sepa que es el quien lo genera-->

<label class="uppercase text-gray-700 text-s">Titulo</label>
<span class="text-xs text-red-600 text-bold">
    @error('title') {{ $message }} @enderror
</span>

<input type="text" name="title" class="rounded borde-gray-200 w-full mb-4"
value="{{ old('title', $post->title) }}">

<label class="uppercase text-gray-700 text-s">Slug</label>
<span class="text-xs text-red-600">
    @error('slug') {{ $message }} @enderror
</span>

<input type="text" name="slug" class="rounded borde-gray-200 w-full mb-4"
value="{{ old('slug', $post->slug) }}">

<label class="uppercase text-gray-700 text-s">Contenido</label>
<span class="text-xs text-red-600">
    @error('body') {{ $message }} @enderror
</span>
<textarea name="body" rows="5" class="rounded borde-gray-200 w-full mb-4">{{ old('body', $post->body) }}</textarea>

<div class="flex justify-between items-center">
    <a href="{{ route('posts.index') }}" class="text-indigo-600">Volver</a>

    <input type="submit" value="Enviar"  class="bg-gray-800 text-white rounded px-4 py-2">
</div>
