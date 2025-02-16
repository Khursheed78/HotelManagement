<div id="editModal" class="fixed inset-0 bg-gray-600 bg-opacity-50 hidden flex items-center justify-center">
    <div class="bg-white p-6 rounded-lg w-1/2">
        <h2 class="text-xl font-bold mb-4">Edit Delivery</h2>
        <form id="editDeliveryForm" action="" method="POST">
            @csrf
            @method('PUT')
            <div class="grid grid-cols-3 gap-1">
                <input type="hidden" id="editDeliveryId" name="deliveryId">

                <!-- DO Number -->
                <div class="mb-4">
                    <label for="editDoNumber" class="block text-gray-700">DO Number</label>
                    <input type="text" id="editDoNumber" name="doNo"
                        class="border border-gray-300 rounded p-2 w-full" required>
                </div>

                <!-- Dimension -->
                <div class="mb-4">
                    <label for="editDimension" class="block text-gray-700">Dimension</label>
                    <select id="editDimension" name="dimension" class="border border-gray-300 rounded p-2 w-full"
                        required>
                        <option value="1x20">1x20</option>
                        <option value="1x40">1x40</option>
                    </select>
                </div>

                <!-- Pullout Date -->
                <div class="mb-4">
                    <label for="editPulloutDate" class="block text-gray-700">Pullout Date</label>
                    <input type="date" id="editPulloutDate" name="pulloutDate"
                        class="border border-gray-300 rounded p-2 w-full" required>
                </div>

                <!-- Container No. -->
                <div class="mb-4">
                    <label for="editContainerNo" class="block text-gray-700">Container No.</label>
                    <input type="text" id="editContainerNo" name="vanNo"
                        class="border border-gray-300 rounded p-2 w-full" required>
                </div>

                <!-- Truck -->
                <div class="mb-3">
                    <label for="editTruck" class="block text-gray-700 font-medium">Truck</label>
                    <select id="editTruck" name="truck_id" class="border border-gray-300 rounded p-2 w-full" required>
                        <option value="" disabled selected>Select a truck</option>
                        @foreach ($trucks as $truck)
                            <option value="{{ $truck->id }}" {{ old('truck_id') == $truck->id ? 'selected' : '' }}>
                                {{ $truck->model }}
                            </option>
                        @endforeach
                    </select>
                    @error('truck_id')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Client -->
                <div class="mb-4">
                    <label for="editClient" class="block text-gray-700 font-medium">Client</label>
                    <select id="editClient" name="client" class="border border-gray-300 rounded p-2 w-full" required>
                        <option value="" disabled selected>Select a client</option>
                        @foreach ($clientNames as $clientName)
                            <option value="{{ $clientName }}" {{ old('client') == $clientName ? 'selected' : '' }}>
                                {{ $clientName }}
                            </option>
                        @endforeach
                    </select>
                    @error('client')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Driver -->
                <div class="mb-4">
                    <label for="editDriver" class="block text-gray-700 font-medium">Assign Driver</label>
                    <select id="editDriver" name="driver" class="border border-gray-300 rounded p-2 w-full" required>
                        <option value="" disabled selected>Select a driver</option>
                        @foreach ($drivers as $driver)
                            <option value="{{ $driver }}" {{ old('driver') == $driver ? 'selected' : '' }}>
                                {{ $driver }}
                            </option>
                        @endforeach
                    </select>
                    @error('driver')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Truck Plate No -->
                <div class="mb-4">
                    <label for="editLicensePlate" class="block text-gray-700 font-medium">Truck Plate No</label>
                    <select id="editLicensePlate" name="licensePlate" class="border border-gray-300 rounded p-2 w-full"
                        required>
                        <option value="" disabled selected>Select a plate number</option>
                        @foreach ($licensePlates as $licensePlate)
                            <option value="{{ $licensePlate }}"
                                {{ old('licensePlate') == $licensePlate ? 'selected' : '' }}>
                                {{ $licensePlate }}
                            </option>
                        @endforeach
                    </select>
                    @error('licensePlate')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Cargo Details -->
                <div class="mb-4">
                    <label for="editCargoDetails" class="block text-gray-700">Cargo Details</label>
                    <textarea id="editCargoDetails" name="cargoDetails" class="border border-gray-300 rounded p-2 w-full"></textarea>
                </div>

                <!-- Place of Delivery -->
                <div class="mb-4">
                    <label for="editPlaceOfDelivery" class="block text-gray-700 font-medium">Place of Delivery</label>
                    <select id="editPlaceOfDelivery" name="location"
                        class="border border-gray-300 rounded p-2 w-full">
                        <option value="" disabled selected>Select a place</option>
                        @foreach ($placesOfDelivery as $place)
                            <option value="{{ $place }}" {{ old('location') == $place ? 'selected' : '' }}>
                                {{ $place }}
                            </option>
                        @endforeach
                    </select>
                    @error('location')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Return Date -->
                <div class="mb-4">
                    <label for="editReturnDate" class="block text-gray-700">Return Date</label>
                    <input type="date" id="editReturnDate" name="returnDate"
                        class="border border-gray-300 rounded p-2 w-full">
                </div>

                <!-- Status -->
                <div class="mb-4">
                    <label for="editStatus" class="block text-gray-700">Status</label>
                    <select id="editStatus" name="status" class="border border-gray-300 rounded p-2 w-full">
                        <option value="pending">Pending</option>
                        <option value="onTheWay">On the Way</option>
                        <option value="delivered">Delivered</option>
                    </select>
                </div>

                <!-- Trucking Fee -->
                <div class="mb-4">
                    <label for="editTruckingFee" class="block text-gray-700">Trucking Fee</label>
                    <input type="text" id="editTruckingFee" name="truckingFee"
                        class="border border-gray-300 rounded p-2 w-full" required>
                </div>
            </div>

            <div class="flex justify-end">
                <button type="button" class="bg-gray-500 text-white px-4 py-2 rounded mr-2"
                    onclick="closeEditModal()">Cancel</button>
                <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded">Update</button>
            </div>
        </form>
    </div>
</div>
<script>
    function openEditModal(deliveryId) {
        // Send an AJAX request to fetch delivery data
        fetch(`/delivery/${deliveryId}/edit`)
            .then(response => response.json())
            .then(data => {
                // Set the form action dynamically based on deliveryId
                const formAction = `/delivery/${deliveryId}`;
                const form = document.getElementById('editDeliveryForm');
                form.action = formAction; // Dynamically set the form action

                // Populate the modal fields with delivery data
                document.getElementById('editDeliveryId').value = data.id;
                document.getElementById('editDoNumber').value = data.doNo;
                document.getElementById('editDimension').value = data.dimension;
                document.getElementById('editPulloutDate').value = data.pulloutDate;
                document.getElementById('editContainerNo').value = data.vanNo;
                document.getElementById('editTruck').value = data.truckModel;
                document.getElementById('editClient').value = data.client;
                document.getElementById('editDriver').value = data.driver;
                document.getElementById('editLicensePlate').value = data.licensePlate;
                document.getElementById('editCargoDetails').value = data.cargoDetails;
                document.getElementById('editPlaceOfDelivery').value = data.location;
                document.getElementById('editReturnDate').value = data.returnDate;
                document.getElementById('editStatus').value = data.status;
                document.getElementById('editTruckingFee').value = data.truckingFee;

                // Show the modal
                document.getElementById('editModal').classList.remove('hidden');
            })
            .catch(error => {
                console.error('Error fetching delivery data:', error);
            });
    }

    function closeEditModal() {
        document.getElementById('editModal').classList.add('hidden');
    }
</script>
