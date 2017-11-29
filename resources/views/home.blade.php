@extends('master')

@section('head')
	<style>
		table tr:nth-child(odd) td{
			background: #f9f9f9;
		}
		table tr:hover td{
			background: #FFF9C2;
		}

		input,
		select{
			outline: none;
		}
		input:focus,
		select:focus{
			border-color: #6CB2EB;
		}
	</style>
@stop

@section('content')

	<div class="text-center">
		<h2 class="mt-4 mb-2 sm:text-3xl">Messy Presents</h2>
		<h4 class="text-grey-light">Version 0.1.0</h4>

		<div class="hidden">
			<form action="{{ route('present.store') }}" method="POST" class="w-full max-w-md">
				<input type="hidden" name="_token" value="{!! csrf_token() !!}">

				<div class="field mb-3">
					<input type="number" min="1" class="appearance-none block w-1/2 text-grey-darker border rounded py-3 px-4" name="number" placeholder="Quantity">
				</div>
				
				<div class="field mb-3">
					<input type="text" class="appearance-none block w-full text-grey-darker border rounded py-3 px-4" name="name" placeholder="Description">
				</div>

		      	<div class="field mb-3">
					<select name="age" class="block appearance-none w-1/2 bg-white border text-grey-darker py-3 px-4 pr-8 rounded">
						<option v-for="age in ages" :value="age">@{{ age }}</option>
					</select>
				</div>

				<div class="field mb-3">
					<select name="gender" class="block appearance-none w-1/2 bg-white border text-grey-darker py-3 px-4 pr-8 rounded">
						<option value="m">Boy</option>
						<option value="f">Girl</option>
						<option value="u">Unisex</option>
					</select>
				</div>

				<input type="submit" value="Save" class="appearance-none bg-blue hover:bg-blue-dark text-white font-bold py-2 px-4 rounded">
			</form>
		</div>
		
		
		<div class="block h-8 sm:h-16 w-full"></div>


		<div class="block mb-4">
			<span class="inline-block bg-grey-lighter rounded-full px-3 py-1 text-sm font-semibold text-grey-darker mr-2">By gender</span>
			<span class="inline-block bg-blue rounded-full px-3 py-1 text-sm text-white mr-2">
			    Boy @{{ countBoys }}
			</span>
			<span class="inline-block bg-pink rounded-full px-3 py-1 text-sm text-white mr-2">
			    Girls @{{ countGirls }}
			</span>
			<span class="inline-block bg-orange rounded-full px-3 py-1 text-sm text-white mr-2">
			    Unisex @{{ countUnisex }}
			</span>
		</div>

		<div class="md:block hidden">
			<span class="inline-block bg-grey-lighter rounded-full px-3 py-1 text-sm font-semibold text-grey-darker mr-2 mb-2">By age</span>
			<div 
			v-for="age in ages"
			class="inline-block mr-2">
				<span class="inline-block bg-grey rounded-l px-3 py-1 text-sm text-white">@{{ age }}</span>
				<span class="inline-block bg-grey-light rounded-r px-3 py-1 text-sm text-white -ml-1">@{{ countAge(age) }}</span>
			</div>
		</div>
	</div>


	<div class="block h-4 sm:h-16 w-full"></div>


	<table class="w-full border text-sm md:text-base" style="border-collapse: collapse">
		<thead>
			<tr>
				<th class="p-2 pt-3 sm:p-4" colspan="5">
					Showing @{{ visibleRows.length }} of @{{ rows.length }}
				</th>
			</tr>
			<tr>
				<th class="p-3 pt-1 sm:p-4 border-b" colspan="5">
					<input class="appearance-none border rounded-full w-full py-2 px-3 text-grey-darker" type="text" placeholder="Search" v-model="query">
				</th>
			</tr>
			<tr>
				<th class="p-2 sm:w-24">No.</th>
				<th class="p-2">Description</th>
				<th class="w-16 p-2">Age</th>
				<th class="p-2">Gender</th>
				<th class="w-4 sm:w-12"></th>
			</tr>
		</thead>
		<tbody>
			<tr v-for="row in visibleRows">
				<td class="p-2 sm:p-3 border">
					<editable :item="row" name="number"></editable>
				</td>
				<td class="p-2 sm:p-3 border">@{{ row.name }}</td>
				<td class="p-2 sm:p-3 border text-center">@{{ row.age }}</td>
				<td class="p-2 sm:p-3 border text-center">@{{ row.gender }}</td>
				<td :class="['p-3 border', 'bg-' + row.color]"></td>
			</tr>
		</tbody>
	</table>

@stop