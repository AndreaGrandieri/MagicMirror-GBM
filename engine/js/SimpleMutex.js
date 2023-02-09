/////////////////////////////////////////////////////////////////
/////////////////////////////////////////////////////////////////
//                                                             //
//                                                             //
// Andrea Grandieri andreagrandieri.github.io                  //
// Copiloted by Copilot@GitHub                                 //
//                                                             //
//                                                             //
/////////////////////////////////////////////////////////////////
/////////////////////////////////////////////////////////////////

// This is a module. The globalThis export is used. The globalThis export can also be used with variables.

// Create a class called "SimpleMutex" with the following attributes:
// "locked" (boolean): true if the mutex is locked, false otherwise
// Do not add other things
export class SimpleMutex {
  constructor() {
    // Indicate whether the mutex is locked or not
    this.locked = false;
  }
}

// Acquire the mutex. If the mutex is already locked, wait until it is unlocked, then acquire it.
// Whoever calls this function will wait until the mutex is unlocked: if the mutex is never unlocked, the function will never resolve, causing a deadlock.
export function acquire(mutex, millis) {
    return new Promise((resolve, reject) => {
    // Wait until the mutex is unlocked, then resolve()
    function wait() {
        if (!mutex.locked) {
            mutex.locked = true;
            resolve();
        } else {
            // Check the value of "millis": if it is under 100, console log a warning that says: "You may experience degraded performance due to the re-sampling of the mutex being too frequent. It is advised to set the value of millis to 100 or higher."
            if (millis < 100) {
                console.warn("You may experience degraded performance due to the re-sampling of the mutex being too frequent. It is advised to set the value of millis to 100 or higher.");
            }

            // Mutex is locked, wait and try again; wait "millis" milliseconds
            // Do not worry: in general, "setTimeout" does not degrade performance in a noticeable way; and... this is the only way a mutex could be implemented
            setTimeout(wait, millis);
        }
    }

    // Start sampling and waiting
    wait();
    });
}

// Release the mutex. No waiting of any kind is needed.
export function release(mutex) {
    mutex.locked = false;
}

/*
You can create your mutexes in your main file or here and exporting them.
*/

// Create a mutex called "selfsustainable_fill_labels_state_mutex" and export it
export const selfsustainable_fill_labels_state_mutex = new SimpleMutex();

// Function to active wait for an event
// Event must be a function that returns a boolean
export function activeWaitEvent(event, millis) {
    return new Promise((resolve, reject) => {
    // Wait until the event is fired, then resolve()
    function wait() {
        if (event()) {
            resolve();
        } else {
            // Check the value of "millis": if it is under 100, console log a warning that says: "You may experience degraded performance due to the re-sampling of the mutex being too frequent. It is advised to set the value of millis to 100 or higher."
            if (millis < 100) {
                console.warn("You may experience degraded performance due to the re-sampling of the mutex being too frequent. It is advised to set the value of millis to 100 or higher.");
            }

            // Event is not fired, wait and try again; wait "millis" milliseconds
            // Do not worry: in general, "setTimeout" does not degrade performance in a noticeable way; and... this is the only way a mutex could be implemented
            setTimeout(wait, millis);
        }
    }

    // Start sampling and waiting
    wait();
    });
}
