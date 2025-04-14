import sys
import os
from rembg import remove
import io

def remove_background(input_path, input_folder, output_folder):
    # Ensure input and output folders exist
    os.makedirs(input_folder, exist_ok=True)
    os.makedirs(output_folder, exist_ok=True)
    
    # Open input image
    with open(input_path, 'rb') as input_file:
        input_data = input_file.read()

    # Remove the background
    output_data = remove(input_data)

    # Generate paths for storing the input and output image
    input_image_path = os.path.join(input_folder, os.path.basename(input_path))
    output_image_path = os.path.join(output_folder, 'output_' + os.path.basename(input_path))

    # Save the input image in the input folder
    with open(input_image_path, 'wb') as input_image_file:
        input_image_file.write(input_data)

    # Save the result in the output folder
    with open(output_image_path, 'wb') as output_file:
        output_file.write(output_data)

    return output_image_path  # Return the path of the saved image

if __name__ == '__main__':
    input_image_path = sys.argv[1]  # The path to the uploaded image
    input_folder = sys.argv[2]  # The folder for input images
    output_folder = sys.argv[3]  # The folder for converted images

    # Get the output image path after removing background
    output_image_path = remove_background(input_image_path, input_folder, output_folder)

    print(f"Processed image saved at {output_image_path}")
