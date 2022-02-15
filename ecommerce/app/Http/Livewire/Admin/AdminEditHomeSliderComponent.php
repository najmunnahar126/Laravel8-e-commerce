<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use Carbon\Carbon;
use App\Models\HomeSlider;
use Livewire\WithFileUploads;

class AdminEditHomeSliderComponent extends Component
{
    use WithFileUploads;
    public $title;
    public $subtitle;
    public $price;
    public $link;
    public $image;
    public $status;
    public $newImage;
    public $slider_id;

    public function mount($slider_id)
    {
        $slider = HomeSlider::where('id',$slider_id)->first();
         $this->title=$slider->title;
         $this->subtitle=$slider->subtitle;
         $this->price=$slider->price;
         $this->link=$slider->link;
         $this->image=$slider->image;
         $this->status=$slider->status;
         $this->slider_id=$slider->id;
    }
    public function updated($fields)
    {
        $this->validateOnly($fields,[
            'title' => 'required',
            'subtitle' => 'required',
            'price' => 'required|numeric',
            'link' => 'required',
            'newImage' => 'required|mimes:jpeg,png',
            'status' => 'required', 
        ]);
    }
    public function updateSlide()
    {
        $this->validate([
            'title' => 'required',
            'subtitle' => 'required',
            'price' => 'required|numeric',
            'link' => 'required',
            'newImage' => 'required|mimes:jpeg,png',
            'status' => 'required',          
        ]);
        $slider = HomeSlider::find($this->slider_id);
        $slider->title = $this->title;
        $slider->subtitle = $this->subtitle;
        $slider->price = $this->price;
        $slider->link = $this->link;
        $slider->title = $this->title;
        if($this->newImage)
        {
            $imageName =Carbon::now()->timestamp.'.'.$this->newImage->extension();
            $this->newImage->storeAs('sliders',$imageName);
             $slider->image =$imageName;
        }
        $slider->status = $this->status;
        $slider->save();
        session()->flash('message','Slider has been updated successfully!');
    }
    public function render()
    {
        return view('livewire.admin.admin-edit-home-slider-component')->layout('layouts.base');
    }
}
