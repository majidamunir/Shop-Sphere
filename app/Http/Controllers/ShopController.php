<?php

namespace App\Http\Controllers;

use App\Models\Shop;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class ShopController extends Controller
{
//    public function showAddShopForm()
//    {
//        return view('addshop');
//    }
//
//    public function storeShop(Request $request)
//    {
//        $request->validate([
//            'name' => 'required|string|max:255',
//            'address' => 'required|string|max:255',
//        ]);
//
//        $user = Auth::user();
//        if ($user->role !== 'shop_owner') {
//            return redirect()->route('dashboard')->with('error', 'Only Owners can Add Shops.');
//        }
//
//        Shop::create([
//            'name' => $request->name,
//            'address' => $request->address,
//            'owner_id' => $user->id,
//        ]);
//
//        return redirect()->route('dashboard')->with('success', 'Shop added Successfully.');
//    }

//    public function index()
//    {
//        $user = Auth::user();
//        $shops = $user->shops; // Fetch shops that belong to the authenticated owner
//
//        return view('shopCrud.index', compact('shops'));
//    }

    public function index()
    {
        // Retrieve all shops owned by the currently authenticated user
        $shops = Shop::where('owner_id', Auth::id())->get();

        // Pass the shops to the view
        return view('shopCrud.index', compact('shops'));
    }

    public function showAddShopForm()
    {
        return view('addshop');
    }

    public function storeShop(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'address' => 'required|string|max:255',
        ]);

        $user = Auth::user();
        if ($user->role !== 'shop_owner') {
            return redirect()->route('dashboard')->with('error', 'Only Owners can Add Shops.');
        }

        Shop::create([
            'name' => $request->name,
            'address' => $request->address,
            'owner_id' => $user->id,
        ]);

        return redirect()->route('shops.index')->with('success', 'Shop added Successfully.');
    }

    public function edit($id)
    {
        $shop = Shop::findOrFail($id);

        if (Auth::user()->id !== $shop->owner_id) {
            return redirect()->route('shops.index')->with('error', 'You can only edit your own shops.');
        }

        return view('shopCrud.update', compact('shop'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'address' => 'required|string|max:255',
        ]);

        $shop = Shop::findOrFail($id);

        if (Auth::user()->id !== $shop->owner_id) {
            return redirect()->route('shops.index')->with('error', 'You can only update your own shops.');
        }

        $shop->update([
            'name' => $request->name,
            'address' => $request->address,
        ]);

        return redirect()->route('shops.index')->with('success', 'Shop updated Successfully.');
    }

    public function destroy($id)
    {
        $shop = Shop::findOrFail($id);

        if (Auth::user()->id !== $shop->owner_id) {
            return redirect()->route('shops.index')->with('error', 'You can only delete your own shops.');
        }

        $shop->delete();

        return redirect()->route('shops.index')->with('success', 'Shop deleted Successfully.');
    }

    public function show($id)
    {
        $shop = Shop::findOrFail($id);
        return view('shopCrud.view', compact('shop'));
    }

    // Customer
    public function viewShops()
    {
        $shops = Shop::all(); // Fetch all shops from the database
        return view('customer.view', compact('shops'));
    }

    public function logout() {
        Auth::logout();
        return redirect()->route('home');
    }
}
