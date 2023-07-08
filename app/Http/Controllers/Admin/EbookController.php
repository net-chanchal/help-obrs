<?php

namespace App\Http\Controllers\Admin;

use App\DataTables\EbookDataTable;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreEbookRequest;
use App\Http\Requests\UpdateEbookRequest;
use App\Models\Ebook;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Str;
use Illuminate\View\View;

class EbookController extends Controller
{
    /**
     * @param EbookDataTable $dataTable
     * @return mixed
     */
    public function index(EbookDataTable $dataTable): mixed
    {
        return $dataTable->render('admin.ebook.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return View
     */
    public function create(): View
    {
        return view('admin.ebook.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param StoreEbookRequest $request
     * @return RedirectResponse
     */
    public function store(StoreEbookRequest $request): RedirectResponse
    {
        $request->validated();

        $ebook = new Ebook();
        $ebook->title = $request->title;
        $ebook->slug = Str::slug($request->title);
        $ebook->writer = $request->writer;
        $ebook->publisher = $request->publisher;
        $ebook->edition = $request->edition;
        $ebook->pages = $request->pages;
        $ebook->price = $request->price;
        $ebook->language = $request->language;
        $ebook->book_url = $request->book_url;
        $ebook->summary = $request->summary;
        $ebook->status = $request->status;

        if ($ebook->save()) {
            return redirect()->back()
                ->with('success', 'Data has been inserted successfully!');
        } else {
            return redirect()
                ->back()
                ->withInput();
        }
    }

    /**
     * Display the specified resource.
     *
     * @param Ebook $ebook
     * @return View
     */
    public function show(Ebook $ebook): View
    {
        return view('admin.ebook.show', compact('ebook'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Ebook $ebook
     * @return View
     */
    public function edit(Ebook $ebook): View
    {
        return view('admin.ebook.edit', compact('ebook'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param UpdateEbookRequest $request
     * @param Ebook $ebook
     * @return RedirectResponse
     */
    public function update(UpdateEbookRequest $request, Ebook $ebook): RedirectResponse
    {
        $request->validated();

        $ebook->title = $request->title;
        $ebook->slug = Str::slug($request->title);
        $ebook->writer = $request->writer;
        $ebook->publisher = $request->publisher;
        $ebook->edition = $request->edition;
        $ebook->pages = $request->pages;
        $ebook->price = $request->price;
        $ebook->language = $request->language;
        $ebook->book_url = $request->book_url;
        $ebook->summary = $request->summary;
        $ebook->status = $request->status;

        if ($ebook->save()) {
            return redirect()->route('admin.ebooks.index')
                ->with('success', 'Data has been updated successfully!');
        } else {
            return redirect()
                ->back();
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Ebook $ebook
     * @return RedirectResponse
     */
    public function destroy(Ebook $ebook): RedirectResponse
    {
        if ($ebook->delete()) {
            return redirect()->back()
                ->with('success', 'Data has been inserted successfully!');
        } else {
            return redirect()->back()
                ->with('success', 'Data has been deleted failed');
        }
    }
}
