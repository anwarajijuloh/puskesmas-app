<div>
    <form action="{{ route('logout') }}" method="post">
        @csrf
        <button type="submit" class="inline-flex justify-center py-2 px-4 border border-transparent text-sm font-medium text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">Logout</button>
    </form>
</div>
